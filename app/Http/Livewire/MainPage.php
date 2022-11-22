<?php

namespace App\Http\Livewire;

use App\Jobs\FetchWeather;
use App\Models\Weather;
use Livewire\Component;

class MainPage extends Component
{
    public $data;

    public function mount()
    {
        $data = Weather::all();
        $this->data = $data->sortByDesc('id')->values();
    }

    public function fetch()
    {
        FetchWeather::dispatchSync();
        $this->data = Weather::all()->sortByDesc('id')->values();
    }

    public function render()
    {
        return view('livewire.main-page');
    }
}
