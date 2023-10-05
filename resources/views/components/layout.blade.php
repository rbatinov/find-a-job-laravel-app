<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        }
    </script>
    <title>Find Jobs & Projects</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>

<body class="mb-48">
    
    {{-- navigation --}}
    <nav class="flex justify-between items-center nav-header">
        <div style="display:inline-block; margin-top:auto; margin-bottom:auto;">
            <a href="{{ route('home_url') }}" title="{{ __('labels.l_homepage') }}">
                <img class="w-24 pt-2 pr-0 pb-0 pl-2"
                    src="{{ asset('images/lion-logo.png') }}" alt="Logo" class="logo" 
                    style="display:inline-block;"/>
            </a>
            <ul class="flex space-x-6 mr-6 text-lg" style="display:inline-block;">
                
                <li>
                    <a href="{{ route('home_url') }}" title="{{ __('labels.l_homepage') }}">
                        <span class="font-bold uppercase text-black" style="color: #431571; font-size:1.5rem; line-height:3rem; border-bottom:1px solid;">{{ config('labels.l_app_name') }}
                        </span>
                    </a>
                </li>

            </ul>
        </div>
        
        
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                @include('partials/_language_switcher')
            </li>
            <li class="max-[650px]:hidden">
                <span class="font-bold uppercase" title="{{ __('labels.l_profile_username') }}">
                    {{ auth()->user()->name }}
                </span>
            </li>
            <li>
                <a href="{{ route('manage_listings_url') }}" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                    {{ __('labels.l_manage_listings') }}</a>
            </li>
            <li>
                <form class="inline" method="POST" action="{{ route('user_logout_url') }}">
                    @csrf
                    
                    <button type="submit">
                      <i class="fa-solid fa-door-closed"></i> {{ __('labels.l_logout') }}
                    </button>
                  </form>
                    
            </li>
            @else
            <li>
                @include('partials/_language_switcher')


            </li>
            <li>
                <a href="{{ route('register_form_url') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> {{ __('labels.l_register') }}</a>
            </li>
            <li>
                <a href="{{ route('login_form_url') }}" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    {{ __('labels.l_login') }}</a>
            </li>
            @endauth
        </ul>
    </nav>


    <main>
        {{ $slot }}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 mt-24 opacity-90 md:justify-center main-gradient">
        <p class="ml-2">{{ config('labels.l_app_name') }} &copy; | {{ date("Y") }} | {{ __('labels.l_all_rights_reserved') }}</p>

        <a href="{{ route('listings_create_form_url') }}" class="absolute rounded right-10 bg-black text-white py-2 px-5" style="background: #431571;
        box-shadow: 0px 0px 10px white;">{{ __('labels.l_post_job') }}</a>
    </footer>

    <x-flash-message />

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
