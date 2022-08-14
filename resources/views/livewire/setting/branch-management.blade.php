<div>
    @if (session()->has('branch-added'))
        <x-alert.notification :bgColor="'green'">
            {{ session('branch-added') }}
        </x-alert.notification>
    @endif
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <p class="flex justify-start text-sm text-gray-600 dark:text-gray-400">
            <label class="block text-sm mx-2">
                <span class="text-gray-700 dark:text-gray-400">Branch Name</span>
                <input wire:model.debounce.500ms="branchName"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Branch Name">
            </label>
            <label class="block text-sm mx-2">
                <span class="text-gray-700 dark:text-gray-400">Branch Code</span>
                <input wire:model.debounce.500ms="branchCode"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Branch Code">
            </label>
        </p>
        <div class="flex justify-end mt-2">
            <button wire:click="addBranch" type="button"
                class="px-4 py-2 text-sm font-medium leading-2 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add Branch
            </button>
        </div>
    </div>
    <div class="mb-4">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Branch Name</th>
                        <th class="px-4 py-3">Branch Code</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @forelse ($branches as $branch)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $branch->branch }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $branch->branch_code }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <button
                                    wire:click="destroy({{ $branch->id }})" type="button"
                                    {{$branch->id==auth('web')->user()->current_branch ? 'disabled' : ''}}
                                    class="px-4 py-2 text-sm font-medium leading-2 text-white transition-colors duration-150 bg-{{$branch->id==auth('web')->user()->current_branch ? 'green' : 'red'}}-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <x-alert.notification :bgColor="'purple'">
                            No Branch Exists
                        </x-alert.notification>
                    @endforelse

                </tbody>
            </table>

        </div>
        <div class="mt-4 w-full overflow-hidden rounded-lg shadow-xs">

            {{ $branches->links() }}
        </div>
    </div>
</div>
