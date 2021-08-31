<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('New account') }}
    </h2>
</x-slot>

<div class="py-12">

    <div class="w-full sm:max-w-md mt-6 mx-auto p-6 bg-white shadow-sm overflow-hidden sm:rounded-lg">
        <form wire:submit.prevent="save">
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input
                    wire:model="name"
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    required
                    autofocus
                />
            </div>

            <!-- Type -->
            <div class="mt-4">
                <x-label for="type" :value="__('Type')" />

                <x-input
                    wire:model="type"
                    id="type"
                    class="block mt-1 w-full"
                    type="text"
                    required
                />
            </div>

            <!-- Color -->
            <div class="mt-4">
                <x-label for="color" :value="__('Color')" />

                <x-input
                    wire:model="color"
                    id="color"
                    class="block mt-1 w-full"
                    type="text"
                    required
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Save') }}
                </x-button>
            </div>

        </form>
    </div>
</div>
