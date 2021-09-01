@props(['disabled' => false])

<div
    x-data="{ color: @entangle($attributes->wire('model')) }"
    x-init="$nextTick(() => {
        const picker = new Picker({
            parent: $el,
            alpha: false,
            editor: false,
            color: color,
        });

        picker.onChange = (newColor) => {
            color = newColor.hex.slice(0,7);
        };
    })"
    wire:ignore
>
    <input x-model="color" {{ $disabled ? 'disabled' : '' }} {!! $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
</div>
