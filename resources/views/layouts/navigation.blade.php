<nav class="navbar sticky-top navbar-expand-md bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-collapse justify-content-center align-items-center d-flex d-lg-justify-content-between">
            <a href="{{ route('index') }}" class="navbar-brand">
                <x-application-logo type="horizontal" size="10em"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav gap-2">
                <li class="nav-item">
                    <x-nav-link :href="route('news')" :active="request()->routeIs('news') || request()->is('news/*')">
                        {{ __('Berita') }}
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link :href="route('sahaminfo')" :active="request()->routeIs('sahaminfo')">
                        {{ __('SahamInfo') }}
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link :href="route('kalkulator')" :active="request()->routeIs('kalkulator')">
                        {{ __('Kalkulator') }}
                    </x-nav-link>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">Log Out</a>
                            </li>
                        </form>
                    </ul>
                </li>
                @else
                <div class="d-flex column justify-content-end gap-2">
                    <form action="{{ route('login') }}" method="get">
                        <button type="submit" class="btn btn-light">Login</button>
                    </form>
                    <form action="{{ route('register') }}" method="get">
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>
