@if (session()->has('password-changed'))
    <x-alert.notification :bgColor="'purple'">
        {{ session('password-changed') }}
    </x-alert.notification>
@endif
<div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <p class="flex justify-between text-sm text-gray-600 dark:text-gray-400">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                    wire.model.debounce.500ms="name"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Name">
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input
                wire.model.debounce.500ms="email"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="admin@gmail.com">
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Phone</span>
                <input
                    wire.model.debounce.500ms="phone"
                    type="number"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="9025807876">
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input
                    wire.model.debounce.500ms="password"
                    type="password"
                    class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Password">
            </label>
        </p>
        <label class="block mt-5 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
               Employee Role
            </span>
            <select
            wire.model.debounce.500ms="role"
                class="block w-1/4 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="0">Choose role</option>
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->role}}</option>
                @endforeach
            </select>
        </label>
        <div class="flex justify-end">
            <button
                class="px-4 py-2 text-sm font-medium leading-2 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add Employee
            </button>
        </div>

    </div>
    <div class="mb-4">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @forelse ($employees as $employee)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $employee->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $employee->role->role }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $employee->email }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-{{ $employee->active_status ? 'green' : 'red' }}-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $employee->active_status ? 'Active' : 'InActive' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <button
                                    class="px-4 py-2 text-sm font-medium leading-2 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    Disable
                                </button>
                            </td>
                        </tr>
                    @empty
                        <x-alert.notification :bgColor="'purple'">
                            No Employees on this branch
                        </x-alert.notification>
                    @endforelse

                </tbody>
            </table>

        </div>
        <div class="mt-4 w-full overflow-hidden rounded-lg shadow-xs">

            {{ $employees->links() }}
        </div>
    </div>
</div>
