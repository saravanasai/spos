<div class="flex flex-row">
    <button class="px-4 py-2 mx-2 text-sm font-medium leading-1 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="button" wire:click="toggleBranchChange">
        Switch
    </button>
    <select
        {{$disabled ? 'disabled' : ''}}
        wire:model="changeBranchId"
        wire:change="handleBranchChange"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        @foreach ($branches as $branch)
            <option value="{{ $branch->id }}" >{{ $branch->branch }}
            </option>
        @endforeach
    </select>
</div>
