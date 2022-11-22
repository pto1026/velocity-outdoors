<div>
    <button wire:click="fetch" class="block mx-auto w-12 h-8 rounded border-0 bg-indigo-600 text-white">Fetch</button>
    <div class="h-24 flex items-center justify-around text-white bg-indigo-600">
        <div>TIME</div>
        <div>STATUS</div>
        <div>DESCRIPTION</div>
        <div>TEMPERATURE</div>
        <div>WIND SPEED</div>
        <div>HUMIDITY</div>
    </div>
    @foreach($data as $result)
        @if($loop->iteration % 2 === 1)
            <div class="h-24 flex items-center justify-around">
                <div>{{$result->created_at->diffForHumans()}}</div>
                <div>{{$result->main}}</div>
                <div>{{$result->description}}</div>
                <div>{{$result->temp}} &deg;F</div>
                <div>{{$result->wind_speed}} mph</div>
                <div>{{$result->humidity}}%</div>
            </div>
        @else
            <div class="h-24 flex items-center justify-around text-white bg-indigo-600">
                <div>{{$result->created_at->diffForHumans()}}</div>
                <div>{{$result->main}}</div>
                <div>{{$result->description}}</div>
                <div>{{$result->temp}} &deg;F</div>
                <div>{{$result->wind_speed}} mph</div>
                <div>{{$result->humidity}}%</div>
            </div>
        @endif
    @endforeach
</div>
