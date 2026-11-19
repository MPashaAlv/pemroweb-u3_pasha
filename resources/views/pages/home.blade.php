
@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!-- HERO INTRODUCTION -->
<section class="welcome-section">

    <div class="welcome-content">
        <span class="eyebrow">SELAMAT DATANG DI PORTAL BERITA</span>

        <h1>
            Informasi yang tepat,
            <span>perspektif yang luas.</span>
        </h1>

        <p>
            Temukan berbagai informasi, berita, dan wawasan terbaru
            yang membantu kamu memahami perkembangan di sekitar.
        </p>

        @guest
            <div class="welcome-actions">
                <a href="{{ route('register') }}" class="button-primary">
                    Mulai Membaca
                    <span>↗</span>
                </a>

                <a href="{{ route('login') }}" class="button-secondary">
                    Masuk ke Akun
                </a>
            </div>
        @else
            <div class="welcome-actions">
                <a href="{{ route('articles.index') }}" class="button-primary">
                    Kelola Artikel
                    <span>↗</span>
                </a>
            </div>
        @endguest
    </div>

    <div class="welcome-decoration">
        <div class="decoration-circle">
            <span>✳</span>
        </div>
        <p>Informasi • Inspirasi • Perspektif</p>
    </div>

</section>


<!-- FEATURED ARTICLE -->
<section class="news-section">

    <div class="section-header">
        <div>
            <span class="eyebrow">PILIHAN REDAKSI</span>
            <h2>Berita Pilihan</h2>
        </div>

        <span class="section-note">01 — 06</span>
    </div>

    @if ($articles->isNotEmpty())

        @php
            $featuredArticle = $articles->first();
        @endphp

        <article class="featured-article">

            <a href="{{ route('articles.show', $featuredArticle) }}"
               class="featured-image-link">

                <img
                    src="{{ $featuredArticle->image_url }}"
                    alt="Gambar {{ $featuredArticle->title }}"
                    class="featured-image"
                >

                <span class="image-label">BERITA PILIHAN</span>
            </a>

            <div class="featured-content">

                <span class="eyebrow">ARTIKEL UTAMA</span>

                <h3>
                    <a href="{{ route('articles.show', $featuredArticle) }}">
                        {{ $featuredArticle->title }}
                    </a>
                </h3>

                <p class="article-description">
                    {{ \Illuminate\Support\Str::limit(
                        $featuredArticle->body, 220
                    ) }}
                </p>

                <div class="article-information">
                    <span>
                        Oleh {{ $featuredArticle->user->name }}
                    </span>

                    <span>•</span>

                    <span>
                        {{ $featuredArticle->created_at->format('d M Y') }}
                    </span>
                </div>

                <a href="{{ route('articles.show', $featuredArticle) }}"
                   class="text-link">
                    Baca selengkapnya <span>↗</span>
                </a>

            </div>

        </article>

    @else

        <div class="empty-state">
            <span class="empty-icon">✳</span>
            <h3>Belum Ada Berita</h3>

            <p>
                Saat ini belum tersedia artikel untuk ditampilkan.
            </p>

            @auth
                <a href="{{ route('articles.create') }}"
                   class="button-primary">
                    Tambah Artikel
                </a>
            @endauth
        </div>

    @endif

</section>


<!-- LATEST ARTICLES -->
@if ($articles->count() > 1)

    <section class="latest-section">

        <div class="section-header">
            <div>
                <span class="eyebrow">JANGAN LEWATKAN</span>
                <h2>Berita Terbaru</h2>
            </div>

            @auth
                <a href="{{ route('articles.index') }}" class="text-link">
                    Lihat semua artikel ↗
                </a>
            @endauth
        </div>

        <div class="latest-grid">

            @foreach ($articles->skip(1) as $article)

                <article class="news-card">

                    <a href="{{ route('articles.show', $article) }}"
                       class="news-image-wrapper">

                        <img
                            src="{{ $article->image_url }}"
                            alt="Gambar {{ $article->title }}"
                            class="news-image"
                            loading="lazy"
                        >

                    </a>

                    <div class="news-card-content">

                        <div class="article-information">
                            <span>
                                {{ $article->created_at->format('d M Y') }}
                            </span>

                            <span>•</span>

                            <span>
                                {{ $article->user->name }}
                            </span>
                        </div>

                        <h3>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit(
                                $article->body, 120
                            ) }}
                        </p>

                        <a href="{{ route('articles.show', $article) }}"
                           class="text-link">
                            Baca selengkapnya ↗
                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    </section>

@endif


<!-- EDITORIAL STATEMENT -->
<section class="editorial-statement">

    <span class="eyebrow">LEBIH DARI SEKADAR BERITA</span>

    <h2>
        Setiap informasi memiliki cerita.
        <span>Setiap cerita memiliki makna.</span>
    </h2>

    <p>
        Membuka wawasan melalui informasi yang mudah diakses
        dan disajikan secara sederhana.
    </p>

    <span class="statement-credit">
        — M.Pasha
    </span>

</section>

@endsection
