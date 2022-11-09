@props([
    'name' => $name,
    'label' => $label,
    'value' => $value ?? null,
])

<div id="group-{{ $name }}" class="mb-6">
    <label for="input-{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ $label }}
    </label>
    <div class="relative">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            {{ $slot }}
        </div>
        <input 
            {{ $attributes->merge(['type' => 'text']) }}
            id="input-{{ $name }}" 
            name="{{ $name }}" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            value="{{ $value }}">
    </div>
</div>