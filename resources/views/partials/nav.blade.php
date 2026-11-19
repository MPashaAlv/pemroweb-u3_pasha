
<header class="site-header">

    <!-- Topbar -->
    <div class="topbar">
        <span>INDEPENDENT DIGITAL JOURNAL</span>

        <span>{{ now()->translatedFormat('l, d F Y') }}</span>
    </div>

    <!-- Brand -->
    <div class="masthead">
        <a href="{{ route('home') }}" class="brand">
            THE DAILY<span>.</span>
        </a>

        <p class="brand-description">
            STORIES THAT MATTER.
        </p>
    </div>

    <!-- Navigation -->
    <nav class="main-nav">

        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>

        @auth
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('articles.index') }}"
               class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">
                Artikel
            </a>
        @endauth

        <div class="nav-right">

            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}" class="nav-register">
                    Register
                </a>
            @endguest

            @auth
                <span class="user-greeting">
                    Hi, {{ auth()->user()->name }}
                </span>

                <form method="POST"
                      action="{{ route('logout') }}"
                      class="inline">
                    @csrf

                    <button type="submit" class="nav-logout">
                        Logout
                    </button>
                </form>
            @endauth

        </div>

    </nav>

</header>
