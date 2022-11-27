<div>
    <div class="bg-gray-50">
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-16 lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to dive in?</span>
                <span class="block text-indigo-600">See the weather that matters to you.</span>
            </h2>
            <div class="mt-8 lg:mt-0 lg:flex lg:flex-shrink-0 lg:items-center">
                <livewire:styled-input class="mb-4" label="Find weather" :value="$search" />
                <button wire:click="searchLocation" class="block items-center justify-center rounded-md border border-transparent bg-indigo-600 px-5 py-3 text-base font-medium text-white hover:bg-indigo-700">Search</button>
            </div>
        </div>
    </div>
</div>
