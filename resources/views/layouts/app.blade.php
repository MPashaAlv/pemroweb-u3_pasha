<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Berita Sederhana')</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            margin: 0;
            line-height: 1.6;
        }
        .container { max-width: 820px; margin: 0 auto; padding: 0 16px; }
        header { background: #ffffff; border-bottom: 2px solid #0f766e; }
        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
        }
        .nav-links { display: flex; gap: 16px; align-items: center; }
        .nav-links a {
            text-decoration: none;
            color: #0f172a;
            font-weight: 500;
            font-size: 15px;
        }
        .nav-links a.active {
            color: #0f766e;
            font-weight: 700;
            text-decoration: underline;
        }
        .nav-user { display: flex; align-items: center; gap: 10px; font-size: 13px; color: #475569; }
        main { padding: 20px 0 36px; }
        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 20px 24px;
            margin-bottom: 16px;
        }
        h1 { margin: 0 0 8px; font-size: 28px; color: #1e293b; }
        h2 { margin: 0 0 14px; font-size: 20px; color: #1e293b; }
        h3 { margin: 0 0 4px; font-size: 17px; }
        h3 a, a.link { color: #0f766e; text-decoration: none; }
        h3 a:hover, a.link:hover { text-decoration: underline; }
        .muted { color: #64748b; font-size: 13px; }
        .btn {
            display: inline-block;
            background: #0f766e;
            color: #ffffff;
            border: none;
            padding: 7px 14px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover { background: #115e59; }
        .btn-sm { padding: 4px 10px; font-size: 12px; }
        .form-group { margin-bottom: 14px; }
        label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 5px; }
        input[type="text"], input[type="email"], input[type="password"], input[type="url"], textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            background: #f1f5f9;
            font-family: inherit;
            font-size: 14px;
        }
        textarea { background: #ffffff; }
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 14px;
            font-size: 14px;
        }
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 14px;
            font-size: 14px;
        }
        .article-item {
            display: flex;
            gap: 16px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 14px;
            margin-bottom: 12px;
        }
        .article-item img {
            width: 170px;
            height: 115px;
            object-fit: cover;
            border-radius: 6px;
            flex-shrink: 0;
        }
        .pagination {
            display: flex;
            gap: 6px;
            list-style: none;
            padding: 0;
            margin: 16px 0 0;
            font-size: 14px;
        }
        .pagination li a, .pagination li span {
            text-decoration: none;
            color: #0f766e;
            padding: 2px 6px;
        }
        .pagination li.active span { font-weight: 700; color: #0f172a; }
        .pagination li.disabled span { color: #94a3b8; }
        footer {
            border-top: 2px solid #0f766e;
            padding: 10px 0 24px;
            font-size: 11px;
            color: #64748b;
        }
        code { background: #f1f5f9; padding: 2px 5px; border-radius: 3px; font-size: 13px; }
    </style>
</head>
<body>
    @include('partials.nav')

    <main class="container">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="container">
        Footer
    </footer>
</body>
</html>