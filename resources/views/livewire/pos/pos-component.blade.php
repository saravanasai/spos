<div>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <p class="flex justify-start text-sm text-gray-600 dark:text-gray-400">
            <label class="block text-sm mx-2">
                <span class="text-gray-700 dark:text-gray-400">Search</span>
                <input wire:model.debounce.500ms="search"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Name / code">
            </label>
        </p>
        <div class="mt-4 scroll-smooth flex justify-self-start">
            @forelse ($products as $product)
                <div class="flex  items-center p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800 mx-1">

                    <div class="">
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ $product->product_name }}
                        </p>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                            Rs:{{ $product->product_price }}
                        </p>
                        <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            stock : {{ $product->product_quantity }}
                        </p>
                    </div>
                    <div
                        class="p-3  ml-4 text-black-500 bg-black-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
                        <button wire:click="addProductToCurrentBill({{ $product->id }})"
                            {{ $product->product_quantity <= 0 ? 'disabled' : '' }}
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-{{ $product->product_quantity <= 0 ? 'red' : 'purple' }}-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-{{ $product->product_quantity <= 0 ? 'red' : 'purple' }}-700 focus:outline-none focus:shadow-outline-purple"
                            aria-label="add">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @empty
                <x-alert.notification :bgColor="'purple'">
                    No Products Matched
                </x-alert.notification>
            @endforelse
        </div>

    </div>



    <div class="grid grid-cols-3 gap-4 ">
        <div class="col-span-2 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex justify-evenly">
                <h4 class="text-lg font-bold">Current Items</h4>
                <p>Bill No: SL-{{ $billNo }}</p>
            </div>
            <div class="w-full overflow-x-auto mt-2">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Product</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                        @forelse ($currentBillProducts as $currentBill)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $currentBill->Product->product_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="flex justify-around">
                                        <button wire:click="decreaseQuantity({{ $currentBill->id }},{{$currentBill->Product->id}})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                            </svg>
                                        </button>
                                        {{ $currentBill->order_product_quantity }}
                                        <button wire:click="increaseQuantity({{ $currentBill->id }},{{$currentBill->Product->id}})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </button>
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $currentBill->Product->product_price }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $currentBill->total * $currentBill->order_product_quantity }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <button wire:click="deleteOrderItems({{ $currentBill->id }},{{$currentBill->Product->id}})"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                        aria-label="Like">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <x-alert.notification :bgColor="'red'">
                                No Products Added
                            </x-alert.notification>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex justify-start">

                <h4 class=" px-4 ml-3 py-3 text-lg font-bold ">Checkout :</h4>

                <p class="px-4 ml-3 py-3 font-bold text-lg">
                 {{$totalAmount}}
                </p>
            </div>
            <div class="flex justify-around">
                <div>
                    <label class="block text-sm mx-2">
                        <span class="text-gray-700 dark:text-gray-400">Amount Paid</span>
                        <input wire:model.debounce.500ms="amountPaid"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Amount Paid">
                    </label>
                    <label class="block text-sm mx-2">
                        <span class="text-gray-700 dark:text-gray-400">Balance</span>
                        <input
                        readonly
                        value="{{$amountPaid=="" ? 0 : $amountPaid-$totalAmount}}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Return Amount">
                    </label>
                </div>
            </div>
            <div class="mt-5 flex justify-around">
                <button
                {{$amountPaid<$totalAmount ? 'disabled' : ''}}
                wire:click="pay"
                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-{{$amountPaid>=$totalAmount ? 'purple' : 'red'}}-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Pay
                  </button>
            </div>
        </div>

    </div>

</div>
