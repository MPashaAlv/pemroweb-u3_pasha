
<header class="header">

    <div class="header-top">
        <span>PORTAL BERITA DIGITAL</span>
        <span>{{ now()->translatedFormat('l, d F Y') }}</span>
    </div>

    <div class="brand-section">

        <a href="{{ route('home') }}" class="brand-logo">
            PORTAL<span>.</span>
        </a>

        <p class="brand-tagline">
            INFORMASI · INSPIRASI · PERSPEKTIF
        </p>

        <span class="creator-label">
            Dibuat oleh M.Pasha
        </span>

    </div>

    <nav class="navigation">

        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Beranda
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

        <div class="navigation-right">

            @guest

                <a href="{{ route('login') }}">Masuk</a>

                <a href="{{ route('register') }}" class="register-link">
                    Daftar
                </a>

            @endguest

            @auth

                <span class="user-name">
                    Halo, {{ auth()->user()->name }}
                </span>

                <form method="POST"
                      action="{{ route('logout') }}"
                      class="inline">
                    @csrf

                    <button type="submit" class="logout-button">
                        Keluar
                    </button>
                </form>

            @endauth

        </div>

    </nav>

</header>
