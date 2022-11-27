<div>
    <label for="{{ $label }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="relative mt-1 rounded-md shadow-sm">
        <input type="text" wire:model="value" name="{{ $label }}" id="{{ $label }}" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
    </div>
</div>
