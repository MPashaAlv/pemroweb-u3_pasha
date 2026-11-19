
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Portal Berita') | Portal Berita</title>

    <meta name="description"
          content="Portal Berita - Informasi, Inspirasi, dan Perspektif.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/editorial.css') }}">
</head>

<body>

    @include('partials.nav')

    <main class="main-container">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-inner">

            <a href="{{ route('home') }}" class="footer-logo">
                PORTAL<span>.</span>
            </a>

            <p>
                Menyajikan informasi, inspirasi, dan perspektif
                untuk setiap pembaca.
            </p>

            <div class="footer-credit">
                <span>© {{ date('Y') }} Portal Berita.</span>
                <span>Dibuat dan dikembangkan oleh <strong>M.Pasha</strong>.</span>
            </div>

        </div>
    </footer>

</body>
</html>
