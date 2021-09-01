<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('message'))
                <x-message :type="session('message')['level']" class="mb-6">
                    {{ session('message')['message'] }}
                </x-message>
            @endif

            <div class="flex items-center space-x-5 px-2">

                <h2 class="text-lg text-gray-800 font-semibold leading-tight">
                    {{ __('Accounts') }}
                </h2>

                <a
                    href="{{ route('accounts.create') }}"
                    class="flex items-center space-x-1 text-gray-500 hover:text-gray-800 transition"
                >

                    <x-heroicon-o-plus-circle class="w-4 h-4"/>

                    <span class="text-xs uppercase leading-none">
                        {{ __('Add account') }}
                    </span>

                </a>

            </div>

            @if ($accounts->count())
                <div class="flex flex-wrap -mx-4">
                    @foreach ($accounts as $account)
                        <div class="p-4 w-full md:w-1/2 lg:w-1/3 -my-2">
                            <div class="bg-white overflow-hidden shadow-sm hover:shadow-lg sm:rounded-lg transition transform hover:scale-105">
                                <div class="px-6 py-4 bg-white border-l-8 border-b border-gray-200" style="border-left-color: {{ $account->color }}">

                                    <div>
                                        <div class="font-semibold text-gray-900">
                                            {{ $account->name }}
                                        </div>

                                        <div class="text-sm text-gray-500">
                                            {{ __('account-types.' . $account->type) }}
                                        </div>
                                    </div>


                                    <div class="text-2xl text-right mt-2">
                                        {{ money($account->transactions_sum_amount ?? 0) }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-6 bg-gray-200 rounded-lg mt-2">
                    <p class="text-gray-600 text-center italic">
                        No accounts to show
                    </p>
                </div>
            @endif

            <div class="flex items-center space-x-5 px-2 mt-6">

                <h2 class="text-lg text-gray-800 font-semibold leading-tight">
                    {{ __('Categories') }}
                </h2>

                <a href="#" class="flex items-center space-x-1 text-gray-500 hover:text-gray-800 transition">

                    <x-heroicon-o-plus-circle class="w-4 h-4"/>

                    <span class="text-xs uppercase leading-none">
                        {{ __('Add category') }}
                    </span>

                </a>

            </div>

            @if ($categories->count())
                <div class="flex flex-wrap -mx-4">
                    @foreach ($categories as $category)
                        <div class="p-4 w-full md:w-1/2 lg:w-1/3 -mt-2">
                            <div class="bg-white overflow-hidden shadow-sm hover:shadow-lg sm:rounded-lg transition transform hover:scale-105">
                                <div class="px-6 py-4 bg-white border-l-8 border-b border-gray-200" style="border-left-color: {{ $category->color }}">

                                    <div class="font-semibold text-gray-900">
                                        {{ $category->name }}
                                    </div>

                                    <div class="text-2xl text-right mt-2">
                                        {{ money($category->transactions_sum_amount ?? 0) }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-6 bg-gray-200 rounded-lg mt-2">
                    <p class="text-gray-600 text-center italic">
                        No categories to show
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
