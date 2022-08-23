<div>
    @if (session()->has('order-added'))
        <x-alert.notification :bgColor="'green'">
            {{ session('order-added') }}
        </x-alert.notification>
    @endif


    <div class="mb-4">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Order ID</th>
                        <th class="px-4 py-3">Total Amount</th>
                        <th class="px-4 py-3">Amount Paid</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @forelse ($orders as $order)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $order->id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $order->order_sum }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $order->amount_paid }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button wire:click="edit({{$order->id}})"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <x-alert.notification :bgColor="'purple'">
                            No order Exists
                        </x-alert.notification>
                    @endforelse

                </tbody>
            </table>

        </div>
        <div class="mt-4 w-full overflow-hidden rounded-lg shadow-xs">
            {{ $orders->links() }}
        </div>
    </div>
    @livewire('orders.order-edit-model',['tittle'=>'Bill edit'])
</div>
