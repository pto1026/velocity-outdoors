@props(['href' => '#', 'isActive' => url()->current() === url($href)])
<a href="{{ !$isActive ? $href : '#' }}"
   @class(['bg-gray-900' => $isActive, 'text-white' => $isActive, 'text-gray-300' => !$isActive, 'hover:bg-gray-700' => !$isActive, 'hover:text-white' => !$isActive, 'px-3', 'py-2', 'rounded-md', 'text-sm', 'font-medium']) @if($isActive) aria-current="page" @endif>
    {{ $slot }}
</a>
