<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('tab_tittle')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/assets/css/tailwind.output.css') }}" />
    <script src="{{ asset('dist/assets/js/alpine-js.js') }}" defer></script>
    <script src="{{ asset('dist/assets/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    @livewireStyles
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('Partials.desktopNav')
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('Partials.mobileNav')
        <div class="flex flex-col flex-1 w-full">
            @include('Partials.header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        @yield('master-tittle')
                    </h2>
                    <!-- Cards -->
                    @yield('content')


                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('dist/assets/js/axios.js') }}" defer></script>
    <script src="{{ asset('dist/assets/js/jquery.js') }}" ></script>
    @livewireScripts
    <script >
        $(document).ready(function(){
            window.livewire.on('alert_remove',()=>{
                setTimeout(function(){ $(".alert").fadeOut('fast');
                }, 3000); // 3 secs
            });
        });
    </script>
</body>

</html>
