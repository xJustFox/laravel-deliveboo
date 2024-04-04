<header class="@yield('header-class')">
    <div class="container-fluid px-4 py-2 d-flex justify-content-between">

        {{-- Logo --}}
        <div class="d-flex align-items-center super-ocean" href="{{ url('/') }}">
            <a href="{{ url('/') }}">
                <img class="logo_deliveboo me-2" src="{{ Vite::asset('public/img/logo.png') }}" alt="">
            </a>
            <a class=" text-decoration-none text-orange" href="{{ url('/') }}">{{ __('Delive') }}</a>
            <a class=" text-decoration-none text-gold" href="{{ url('/') }}">{{ __('Boo') }}</a>
        </div>

        {{-- Center Links --}}
        <div class="d-none d-md-block">
            <ul class="d-flex align-items-center list-unstyled h-100">
                @guest
                    {{-- Home --}}
                    <li class=>
                        <a class="my-nav-link super-ocean" href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>
                @else
                    <li>
                        {{-- Dashboard --}}
                        <a class="my-nav-link super-ocean {{ Route::currentRouteName() == 'user.dashboard' ? 'activeRoute' : '' }}"
                            href="{{ route('user.dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li>
                        <a class="my-nav-link super-ocean {{ Route::currentRouteName() == 'user.restaurant.index' || Route::currentRouteName() == 'user.restaurant.edit'
                            ? 'activeRoute'
                            : '' }}"
                            href="{{ route('user.restaurant.index') }}">{{ __('Il tuo Ristorante') }}</a>
                    </li>
                    <li>
                        <a class="my-nav-link super-ocean {{ Route::currentRouteName() == 'user.orders.index' ? 'activeRoute' : '' }}"
                            href="{{ route('user.orders.index') }}">{{ __('I tuoi Ordini') }}</a>
                    </li>
                    <li>
                        <a class="my-nav-link super-ocean {{ Route::currentRouteName() == 'user.statistic' ? 'activeRoute' : '' }}"
                            href="{{ route('user.statistic') }}">{{ __('Le tue Statistiche') }}</a>
                    </li>
                @endguest
            </ul>
        </div>

        {{-- Right Menù --}}
        <div class="">
            <ul class="d-flex align-items-center list-unstyled m-0 h-100">

                <!-- Authentication Links -->
                @guest
                    <li class="d-md-none">
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
                                            <span><a class="dropdown-item "
                                                    href="{{ route('login') }}">{{ __('Accedi') }}</a></span>
                                        </button>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <button>
                                                <span><a class="dropdown-item"
                                                        href="{{ route('register') }}">{{ __('Registrati') }}</a></span>
                                            </button>
                                        </li>
                                    @endif
                                    <li>
                                </ul>
                            </nav>
                        </label>
                    </li>

                    <li class="d-none d-md-block">
                        <a class="btn-login super-ocean me-3" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="d-none d-md-block">
                            <a class="btn-register super-ocean" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                    @endif
                @else
                    <li class="fw-bold d-flex align-items-center">
                        <span class="pe-3 d-none d-md-block text-white" href="#">
                            {{ Auth::user()->name }}
                        </span>
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
                                    <li class=" d-md-none">
                                        <button>
                                            <span><a class="dropdown-item"
                                                    href="{{ route('user.restaurant.index') }}">{{ __('I tuoi Ristoranti') }}</a></span>
                                        </button>
                                    </li>
                                    <li class=" d-md-none">
                                        <button>
                                            <span><a class="dropdown-item"
                                                    href="{{ route('user.orders.index') }}">{{ __('I tuoi Ordini') }}</a></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item"
                                                    href="{{ url('profile') }}">{{ __('Area Personale') }}</a></span>
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <span><a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    {{ __('Disconnetti') }}
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
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>
