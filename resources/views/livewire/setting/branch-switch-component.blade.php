<div>
    <select
        wire:model="changeBranchId"
        wire:change="handleBranchChange"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        @foreach ($branches as $branch)
            <option value="{{ $branch->id }}" >{{ $branch->branch }}
            </option>
        @endforeach
    </select>
</div>
