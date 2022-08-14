<div>
    @if (session()->has('product-added'))
        <x-alert.notification :bgColor="'green'">
            {{ session('product-added') }}
        </x-alert.notification>
    @endif
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <p class="flex justify-start text-sm text-gray-600 dark:text-gray-400">
            <label class="block text-sm mx-2">
                <span class="text-gray-700 dark:text-gray-400">product Name</span>
                @error('product.product_name')
                <span class="text-red-700 dark:text-red-400">{{$message}}</span>
                @enderror
                <input wire:model.debounce.500ms="product.product_name"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product Name">
            </label>
            <label class="block text-sm mx-2">
                <span class="text-gray-700 dark:text-gray-400">product Code</span>
                @error('product.product_code')
                <span class="text-red-700 dark:text-red-400">{{$message}}</span>
                @enderror
                <input wire:model.debounce.500ms="product.product_code"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product Code">
            </label>
            <label class="block text-sm mx-2">
                <span class="text-gray-700 dark:text-gray-400">product Qunatity</span>
                @error('product.product_quantity')
                <span class="text-red-700 dark:text-red-400">{{$message}}</span>
                @enderror
                <input wire:model.debounce.500ms="product.product_quantity"

                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product Qunatity">
            </label>
            <label class="block text-sm mx-2">
                <span class="text-gray-700 dark:text-gray-400">product Price</span>
                @error('product.product_price')
                <span class="text-red-700 dark:text-red-400">{{$message}}</span>
                @enderror
                <input wire:model.debounce.500ms="product.product_price"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Product Price">
            </label>
        </p>
        <div class="flex justify-end mt-2">

            <button wire:click="addProduct" type="button"
                class="px-4 py-2 text-sm font-medium leading-2 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add product
            </button>
        </div>
    </div>
    <div class="mb-4">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Product Name</th>
                        <th class="px-4 py-3">Product Code</th>
                        <th class="px-4 py-3">Product Price</th>
                        <th class="px-4 py-3">Balance Stock</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @forelse ($products as $product)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $product->product_name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->product_code }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->product_price }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->product_quantity }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <button wire:click="destroy({{ $product->id }})" type="button"
                                    class="px-4 py-2 text-sm font-medium leading-2 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <x-alert.notification :bgColor="'purple'">
                            No product Exists
                        </x-alert.notification>
                    @endforelse

                </tbody>
            </table>

        </div>
        <div class="mt-4 w-full overflow-hidden rounded-lg shadow-xs">

            {{ $products->links() }}
        </div>
    </div>
</div>
