<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>

            <h2 class="text-lg text-gray-800 font-semibold leading-tight px-2 mt-6">
                {{ __('Accounts') }}
            </h2>


            @if ($accounts->count())
                <div class="flex flex-wrap -mx-4">
                    @foreach ($accounts as $account)
                        <div class="p-4 w-full md:w-1/2 lg:w-1/3 -mt-2">
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

        </div>
    </div>
</x-app-layout>
