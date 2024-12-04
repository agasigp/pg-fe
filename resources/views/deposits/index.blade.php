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
                        <div class="overflow-x-auto mt-6 space-y-6">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <a class="btn btn-accent" href="{{ route('deposits.create') }}">Add Data</a>
                            @if ($deposits->isEmpty())
                                There's no data.
                            @else
                                <table class="table table-zebra">
                                    <!-- head -->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ORDER ID</th>
                                            <th>AMOUNT</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $deposits->currentPage() == 1 ? 1 : $deposits->perPage() * ($deposits->currentPage() - 1) + 1; ?>
                                        @foreach ($deposits as $deposit)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <td>{{ $deposit->order_id }}</td>
                                                <td>
                                                    <span
                                                        class="{{ $deposit->amount < 0 ? 'text-red-600' : 'text-green-900' }}">
                                                        {{ $deposit->amount }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @php
                                                        if ($deposit->status === 0) {
                                                            $statusText = 'Not Sent';
                                                            $className = 'neutral';
                                                        } elseif ($deposit->status === 1) {
                                                            $statusText = 'Sent, error 4XX';
                                                            $className = 'warning';
                                                        } elseif ($deposit->status === 2) {
                                                            $statusText = 'Sent, status failed (2)';
                                                            $className = 'error';
                                                        } elseif ($deposit->status === 3) {
                                                            $statusText = 'Sent, status success (1)';
                                                            $className = 'success';
                                                        } else {
                                                            $statusText = 'Sent, erro 5xx';
                                                            $className = 'error';
                                                        }
                                                    @endphp
                                                    <div class="badge badge-{{ $className }}">{{ $statusText }}</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $deposits->links() }}
                        </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
