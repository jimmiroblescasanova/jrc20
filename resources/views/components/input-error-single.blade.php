@props([
    'field' => $field,
])

@error($field)
    <p class="pl-2 mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}</p>
@enderror