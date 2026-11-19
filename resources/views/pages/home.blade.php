
@extends('layouts.app')

@section('title', 'The Daily Journal - Latest Stories')

@section('content')

@php
    $featuredArticle = $articles->first();
    $otherArticles = $articles->skip(1);
@endphp

<!-- HERO SECTION -->
<section class="hero-section">

    <div class="section-heading">
        <div>
            <span class="eyebrow">THE DAILY JOURNAL</span>
            <h2>Today's Perspective</h2>
        </div>

        <span class="article-meta">CURATED STORIES</span>
    </div>

    @if ($featuredArticle)

        <div class="hero-grid">

            <!-- Featured Image -->
            <div class="hero-image-wrapper">
                <img
                    src="{{ $featuredArticle->image_url ?: 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=1200' }}"
                    alt="{{ $featuredArticle->title }}"
                    class="hero-image"
                >
            </div>

            <!-- Featured Content -->
            <div class="hero-content">

                <span class="eyebrow">FEATURED STORY</span>

                <h1>
                    {{ $featuredArticle->title }}
                </h1>

                <div class="article-meta">
                    By {{ $featuredArticle->user->name }}
                    &nbsp; • &nbsp;
                    {{ $featuredArticle->created_at->format('d M Y') }}
                </div>

                <p class="hero-description">
                    {{ \Illuminate\Support\Str::limit(
                        $featuredArticle->body, 220
                    ) }}
                </p>

                <a
                    href="{{ route('articles.show', $featuredArticle) }}"
                    class="read-more"
                >
                    Read Full Story →
                </a>

            </div>

        </div>

    @else

        <div class="empty-state">
            <h3>No Stories Available</h3>
            <p>Belum ada berita yang dapat ditampilkan.</p>

            @auth
                <a href="{{ route('articles.create') }}" class="read-more">
                    Create First Article →
                </a>
            @endauth
        </div>

    @endif

</section>


<!-- LATEST ARTICLES -->
@if ($otherArticles->isNotEmpty())

    <section class="latest-section">

        <div class="section-heading">
            <div>
                <span class="eyebrow">EXPLORE MORE</span>
                <h2>Latest Stories</h2>
            </div>

            @auth
                <a href="{{ route('articles.index') }}"
                   class="read-more">
                    View All →
                </a>
            @endauth
        </div>


        <div class="article-grid">

            @foreach ($otherArticles as $article)

                <article class="article-card">

                    <a href="{{ route('articles.show', $article) }}"
                       class="article-image-wrapper">

                        <img
                            src="{{ $article->image_url ?: 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=800' }}"
                            alt="{{ $article->title }}"
                            class="article-image"
                            loading="lazy"
                        >

                    </a>

                    <div class="article-meta">
                        {{ $article->created_at->format('d M Y') }}
                        &nbsp; • &nbsp;
                        {{ $article->user->name }}
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

                    <a
                        href="{{ route('articles.show', $article) }}"
                        class="card-link"
                    >
                        Read Article →
                    </a>

                </article>

            @endforeach

        </div>

    </section>

@endif


<!-- EDITORIAL FOOTNOTE -->
<section style="
    margin-top: 75px;
    padding: 35px 20px;
    border-top: 1px solid var(--black);
    border-bottom: 1px solid var(--black);
    text-align: center;
">

    <span class="eyebrow">OUR PHILOSOPHY</span>

    <h2 style="
        margin-top: 12px;
        font-family: var(--heading);
        font-size: clamp(25px, 4vw, 38px);
        font-weight: 500;
    ">
        Stories that inform.<br>
        Perspectives that inspire.
    </h2>

</section>

@endsection
