<div>
    <div class="w-full">
        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Change Profile Picture
        </h1>
        @if (session()->has('profile-image-changed'))
            <x-alert.notification :bgColor="'green'">
                {{ session('profile-image-changed') }}
            </x-alert.notification>
        @endif
        @if ($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}">
        @endif
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Choose Image
            </span>
            <div class="relative text-gray-500 focus-within:text-purple-600">
                <input wire:model="photo" type="file"
                    class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe">
                <button wire:click="save"
                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Upload
                </button>
                @error('photo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </label>
    </div>

</div>
