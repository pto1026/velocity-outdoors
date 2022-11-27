<div {{ $attributes->merge(['class' => "flex items-center"]) }}>
    <div class="flex-shrink-0">
        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
    </div>
    <div class="hidden md:block">
        <div class="ml-10 flex items-baseline space-x-4">
            <x-navbar.link href="/dashboard">Dashboard</x-navbar.link>
        </div>
    </div>
</div>
