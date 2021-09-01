<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('New account') }}
    </h2>
</x-slot>

<div class="py-12">

    <div class="w-full sm:max-w-md mt-6 mx-auto p-6 bg-white shadow-sm sm:rounded-lg">
        <form wire:submit.prevent="save">
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input
                    wire:model.defer="name"
                    :has-error="$errors->has('name')"
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    required
                    autofocus
                    maxlength="255"
                />

                @if ($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <!-- Type -->
            <div class="mt-4">
                <x-label for="type" :value="__('Type')" />

                <x-select
                    wire:model.defer="type"
                    id="type"
                    class="block mt-1 w-full"
                    type="text"
                    required
                >

                    <option value="CHECKING">
                        Checking
                    </option>

                    <option value="SAVINGS">
                        Savings
                    </option>

                    <option value="CREDITCARD">
                        Credit Card
                    </option>

                </x-select>

            </div>

            <!-- Color -->
            <div class="mt-4">
                <x-label for="color" :value="__('Color')" />

                <x-color-picker
                    wire:model.defer="color"
                    id="color"
                    class="block mt-1 w-full"
                    type="text"
                    required
                    maxlength="7"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-button>
            </div>

        </form>
    </div>
</div>
