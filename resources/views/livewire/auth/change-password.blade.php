<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="w-1/2">
        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Change password
        </h1>
        @if (session()->has('password-changed'))
            <x-alert.notification :bgColor="'purple'">
                {{ session('password-changed') }}
            </x-alert.notification>
        @endif
        <div class="mb-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">New Password</span>
                @error('newPassword')
                    <span class="text-red-700 dark:text-red-400">{{ $message }}</span>
                @enderror
                <input wire:model.debounce.500ms="newPassword" type="password"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="New Password">
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Confrim Password</span>

                @error('confrimPassword')
                    <span class="text-red-700 dark:text-red-400">{{ $message }}</span>
                @enderror

                <input wire:model.debounce.500ms="confrimPassword" type="password"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="New Password">
            </label>
        </div>
        <!-- You should use a button here, as the anchor is only used for the example  -->
        <button wire:click="changePassword"
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="button" {{ $disabled ? 'disabled' : '' }}>
            Update password
        </button>
    </div>
</div>
