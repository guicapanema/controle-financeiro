@props([
    'type' => 'info',
])

<div {{ $attributes->class(['flex items-center p-4 rounded-sm', 'bg-green-100' => $type === 'success']) }}>

    <x-heroicon-s-check-circle class="text-green-400 w-5 h-5" />

    <p class="text-green-700 ml-2">
        {{ $slot }}
    </p>

</div>
