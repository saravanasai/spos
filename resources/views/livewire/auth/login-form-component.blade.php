<div class="w-full">
    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
        S-POS Admin Login
    </h1>
    <div>
        @if (session()->has('login-failed'))
            <x-alert.notification :bgColor="'red'">
                {{ session('login-failed') }}
            </x-alert.notification>
        @endif
    </div>
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        @error('email')
            <span class="text-red-700 dark:text-red-400">{{ $message }}</span>
        @enderror
        <input wire:model.debounce.500ms="email" type="email"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Email">
    </label>
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Password</span>
        @error('password')
            <span class="text-red-700 dark:text-red-400">{{ $message }}</span>
        @enderror
        <input wire:model.debounce.500ms="password"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="password" type="password">

    </label>
    <!-- You should use a button here, as the anchor is only used for the example  -->
    <a wire:click="login"
        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        type="button">
        Log in
    </a>
    <a href="{{route('employee-login')}}"
        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
        Employee Login
    </a>
</div>
