<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Deposit/Withdraw
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Deposit/Withdraw
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Input your withdraw or depost nominal
                            </p>
                        </header>
                        <form method="POST" action="{{ route('deposits.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="order_id" :value="'Order ID'" />
                                <x-text-input id="order_id" class="block mt-1 w-full" type="text" name="order_id"
                                    :value="old('order_id')" required autofocus autocomplete="order_id" />
                                <x-input-error :messages="$errors->get('order_id')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="amount" :value="'Amount'" />
                                <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" step="0.01"
                                    :value="old('amount')" required autofocus autocomplete="amount" />
                                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="type" :value="'Type'" />
                                <select class="select select-bordered w-full mt-1" name="type">
                                    <option value="withdraw">Withdraw</option>
                                    <option value="depost">Deposit</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>
                            <div>
                                <x-primary-button type="submit">
                                    Submit
                                </x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
