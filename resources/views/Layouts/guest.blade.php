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
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
          <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
              <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{asset('dist/assets/img/login-office.jpeg')}}" alt="Office">
              <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{asset('dist/assets/img/login-office-dark.jpeg')}}"alt="Office">
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                @yield('guest-content')
            </div>
          </div>
        </div>
      </div>

    <script src="{{ asset('dist/assets/js/axios.js') }}" defer></script>
    <script src="{{ asset('dist/assets/js/jquery.js') }}" defer></script>
    @livewireScripts
    <script >
        $(document).ready(function(){
            window.livewire.on('alert_remove',()=>{
                setTimeout(function(){ $(".alert-success").fadeOut('fast');
                }, 3000); // 3 secs
            });
        });
    </script>
</body>

</html>
