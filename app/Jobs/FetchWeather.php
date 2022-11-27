<?php

namespace App\Jobs;

use App\Models\Weather;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchWeather implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=39.52&lon=-104.67&units=imperial&appid=c40a19dc1e482e6228c13afd62c9d524')->collect();
        $weather = new Weather;
        $weather->main = $data['weather'][0]['main'];
        $weather->description = $data['weather'][0]['description'];
        $weather->temp = $data['main']['temp'];
        $weather->wind_speed = $data['wind']['speed'];
        $weather->humidity = $data['main']['humidity'];
        $weather->save();
    }
}
