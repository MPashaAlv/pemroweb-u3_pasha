
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- DASHBOARD HEADING -->
<section class="dashboard-heading">

    <div>
        <span class="eyebrow">RUANG KERJA PENULIS</span>

        <h1>Dashboard<span>.</span></h1>

        <p>
            Selamat datang kembali,
            <strong>{{ $user->name }}</strong>.
            Berikut ringkasan aktivitas portal berita kamu.
        </p>
    </div>

    <a href="{{ route('articles.create') }}" class="button-primary">
        + Tulis Artikel Baru
    </a>

</section>


<!-- STATISTICS -->
<section class="dashboard-stats">

    <article class="stat-card">
        <div class="stat-top">
            <span class="stat-label">TOTAL ARTIKEL</span>
            <span class="stat-icon">▤</span>
        </div>

        <h2>{{ $totalArticles }}</h2>

        <p>Seluruh artikel dalam sistem</p>
    </article>


    <article class="stat-card stat-highlight">
        <div class="stat-top">
            <span class="stat-label">ARTIKEL KAMU</span>
            <span class="stat-icon">✎</span>
        </div>

        <h2>{{ $myArticles }}</h2>

        <p>Artikel yang telah kamu buat</p>
    </article>


    <article class="stat-card">
        <div class="stat-top">
            <span class="stat-label">STATUS AKUN</span>
            <span class="stat-icon">◉</span>
        </div>

        <h2 class="account-status">Aktif</h2>

        <p>Selamat datang di ruang kerja kamu</p>
    </article>

</section>


<!-- QUICK ACTIONS -->
<section class="dashboard-section">

    <div class="section-header">
        <div>
            <span class="eyebrow">MANAJEMEN KONTEN</span>
            <h2>Aksi Cepat</h2>
        </div>
    </div>

    <div class="quick-action-grid">

        <a href="{{ route('articles.create') }}" class="quick-action">
            <span class="quick-icon">＋</span>

            <div>
                <h3>Tambah Artikel</h3>
                <p>Publikasikan berita atau informasi baru.</p>
            </div>

            <span class="quick-arrow">↗</span>
        </a>


        <a href="{{ route('articles.index') }}" class="quick-action">
            <span class="quick-icon">▤</span>

            <div>
                <h3>Kelola Artikel</h3>
                <p>Lihat, edit, dan kelola artikel kamu.</p>
            </div>

            <span class="quick-arrow">↗</span>
        </a>


        <a href="{{ route('home') }}" class="quick-action">
            <span class="quick-icon">⌂</span>

            <div>
                <h3>Lihat Homepage</h3>
                <p>Kunjungi halaman utama portal berita.</p>
            </div>

            <span class="quick-arrow">↗</span>
        </a>

    </div>

</section>


<!-- LATEST ARTICLES -->
<section class="dashboard-section">

    <div class="section-header">
        <div>
            <span class="eyebrow">PEMBARUAN KONTEN</span>
            <h2>Artikel Terbaru</h2>
        </div>

        <a href="{{ route('articles.index') }}" class="text-link">
            Lihat semua ↗
        </a>
    </div>


    <div class="dashboard-articles">

        @if ($latestArticles->isNotEmpty())

            @foreach ($latestArticles as $article)

                <article class="dashboard-article">

                    <a href="{{ route('articles.show', $article) }}"
                       class="dashboard-article-image">

                        <img
                            src="{{ $article->image_url }}"
                            alt="Thumbnail {{ $article->title }}"
                            loading="lazy"
                        >

                    </a>

                    <div class="dashboard-article-content">

                        <div class="article-information">
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                            <span>•</span>
                            <span>{{ $article->user->name }}</span>
                        </div>

                        <h3>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit(
                                $article->body, 110
                            ) }}
                        </p>

                    </div>

                    <a href="{{ route('articles.show', $article) }}"
                       class="article-open">
                        ↗
                    </a>

                </article>

            @endforeach

        @else

            <div class="dashboard-empty">
                <span>✳</span>
                <h3>Belum Ada Artikel</h3>
                <p>Artikel terbaru akan muncul di bagian ini.</p>

                <a href="{{ route('articles.create') }}"
                   class="button-primary">
                    Buat Artikel Pertama
                </a>
            </div>

        @endif

    </div>

</section>


<!-- ACCOUNT INFORMATION -->
<section class="account-panel">

    <div class="account-heading">
        <span class="eyebrow">INFORMASI PENGGUNA</span>
        <h2>Profil Akun</h2>
    </div>

    <div class="account-details">

        <div class="account-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <div class="account-data">
            <span class="account-label">NAMA PENGGUNA</span>
            <h3>{{ $user->name }}</h3>

            <span class="account-label">ALAMAT EMAIL</span>
            <p>{{ $user->email }}</p>
        </div>

    </div>

    <p class="account-note">
        Gunakan menu navigasi untuk berpindah antara halaman Home,
        Artikel, dan Dashboard.
    </p>

</section>


@endsection
