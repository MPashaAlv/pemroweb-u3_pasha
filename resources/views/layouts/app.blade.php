
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'The Daily Journal')</title>

    <meta name="description"
          content="Portal berita dan informasi terkini.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/editorial.css') }}">
</head>

<body>

    @include('partials.nav')

    <main class="site-main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <a href="{{ route('home') }}" class="footer-brand">
                THE DAILY<span>.</span>
            </a>

            <p>
                Independent stories. Different perspectives.
            </p>

            <div class="footer-bottom">
                <span>© {{ date('Y') }} The Daily Journal.</span>
                <span>Designed with editorial elegance.</span>
            </div>
        </div>
    </footer>

</body>
</html>
