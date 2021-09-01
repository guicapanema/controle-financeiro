@props([
    'disabled' => false,
    'hasError' => false,
])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->class([
        'rounded-md',
        'shadow-sm',
        'focus:border-indigo-300',
        'focus:ring',
        'focus:ring-indigo-200',
        'focus:ring-opacity-50',
        $hasError ? 'border-red-600' : 'border-gray-300',
    ])
!!}>
