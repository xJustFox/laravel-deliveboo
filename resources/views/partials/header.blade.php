<header class="@yield('header-class')">
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid mx-3">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div>
                    <img class="logo_deliveboo" src="{{ Vite::asset('public/img/logo.png') }}" alt="">
                </div>
                {{-- config('app.name', 'Laravel') --}}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item d-flex">
                        <div class="d-flex pt-2 super-ocean">
                            <a class="logo-title text-orange" href="{{ url('/') }}">{{ __('Delive') }}</a>
                            <a class="logo-title text-gold" href="{{ url('/') }}">{{ __('Boo') }}</a>
                        </div>
                        <div class="pt-1 ps-4">
                            <ul class="navbar-nav me-auto">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link super-ocean" href="{{ url('/') }}">{{ __('Home') }}</a>
                                    </li>
                                @else
                                <li>
                                    <a class="nav-link text-white super-ocean" href="{{route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                                </li>  
                                <li>
                                    <a class="nav-link text-white super-ocean" href="{{ route('user.restaurant.index') }}">{{ __('I tuoi Ristoranti') }}</a>
                                </li>
                                <li>
                                    <a class="nav-link text-white super-ocean" href="{{ route('user.orders.index') }}">{{ __('I tuoi Ordini') }}</a>
                                </li>          
                                @endguest
                            </ul>
                        </div>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn-login super-ocean me-3"
                                href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn-register super-ocean"
                                    href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown pe-2 fw-bold">
                            <span class="nav-link text-white" href="#">
                                {{ Auth::user()->name }}
                            </span>
                        </li>
                        <label class="popup">
                            <input type="checkbox">
                            <div class="burger" tabindex="0">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <nav class="popup-window">
                                <ul>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item"
                                                    href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item"
                                                    href="{{ url('profile') }}">{{ __('Profile') }}</a></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a></span>
                                        </button>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <li>
                                </ul>
                            </nav>
                        </label>
                    @endguest


                </ul>
            </div>
        </div>
    </nav>
</header>
