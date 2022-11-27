<?php

namespace App\Http\Livewire;

use App\Models\CurrentWeather;
use App\Models\Location;
use App\Models\OneCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Dashboard extends Component
{
    public $search = '';
    public $location;
    public $currentWeather;
    public $complete;

    protected $listeners = ['changedSearch'];

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.ui');
    }

    public function oneCall()
    {
        if (count(OneCall::where('location_id', '=', $this->location->id)->get()) > 0) {
            $results = OneCall::where('location_id', '=', $this->location->id)->get()[0];
            if (!$results->users->contains(Auth::user()->id)) {
                $results->users()->attach(Auth::user()->id);
            }
            $this->complete = $results;
        } else {
            $this->newCall();
        }
    }

    public function newCall()
    {
        if (count(OneCall::where('location_id', '=', $this->location->id)->get()) > 0) {
            $results = OneCall::where('location_id', '=', $this->location->id)->get();
            foreach ($results as $result) {
                $result->users()->detach();
                $result->delete();
            }
        }
        $response = Http::get('https://api.openweathermap.org/data/3.0/onecall?lat=' . $this->location->lat . '&lon=' . $this->location->lon . '&units=imperial&lang=en&appid=c40a19dc1e482e6228c13afd62c9d524')->json();
        $oneCall = new OneCall;
        $oneCall->location_id = $this->location->id;
        $oneCall->data = $response;
        $oneCall->save();
        $oneCall->users()->attach(Auth::user()->id);
        $this->complete = $oneCall;
    }

    public function checkCurrentWeather()
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=' . $this->location->lat . '&lon=' . $this->location->lon . '&units=imperial&appid=c40a19dc1e482e6228c13afd62c9d524')->collect();
        $weather = new CurrentWeather;
        $weather->main = $response['weather'][0]['main'];
        $weather->description = $response['weather'][0]['description'];
        $weather->temp = $response['main']['temp'];
        $weather->wind_speed = $response['wind']['speed'];
        $weather->humidity = $response['main']['humidity'];
        $weather->location_id = $this->location->id;
        $weather->save();
        $weather->users()->attach(Auth::user()->id);
        $this->currentWeather = $weather;
    }

    public function changedSearch($value)
    {
        $this->search = $value;
    }

    public function searchLocation()
    {
        $response = Http::get('http://api.openweathermap.org/geo/1.0/direct?q=' . $this->search . '&appid=c40a19dc1e482e6228c13afd62c9d524')->collect();
        if (count(Location::where('lat', '=', $response[0]['lat'])->where('lon', '=', $response[0]['lon'])->get()) === 0) {
            $location = new Location;
            $location->name = $response[0]['name'];
            $location->lat = $response[0]['lat'];
            $location->lon = $response[0]['lon'];
            $location->save();
        } else {
            $location = Location::where('lat', '=', $response[0]['lat'])->where('lon', '=', $response[0]['lon'])->get()[0];
        }
        if (!$location->users->contains(Auth::user()->id)) {
            $location->users()->attach(Auth::user()->id);
        }
        $this->location = $location;
//        $this->checkCurrentWeather();
        $this->oneCall();
    }
}
