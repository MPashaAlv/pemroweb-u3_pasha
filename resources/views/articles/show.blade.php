
@extends('layouts.app')

@section('title', $article->title)

@section('content')

<div class="detail-navigation">
    <a href="{{ route('home') }}">Beranda</a>
    <span>/</span>
    <a href="{{ route('articles.index') }}">Artikel</a>
    <span>/</span>
    <span>Detail</span>
</div>

<article class="detail-article">

    <header class="detail-header">

        <span class="eyebrow">ARTIKEL & INFORMASI</span>

        <h1>{{ $article->title }}</h1>

        <div class="detail-meta">
            <span>Oleh <strong>{{ $article->user->name }}</strong></span>
            <span>•</span>
            <span>{{ $article->created_at->format('d F Y') }}</span>
        </div>

    </header>

    <figure class="detail-cover">
        <img src="{{ $article->image_url }}"
             alt="Gambar {{ $article->title }}">
    </figure>

    <div class="detail-body">
        {!! nl2br(e($article->body)) !!}
    </div>

    <footer class="detail-footer">

        <div>
            <span class="eyebrow">PENERBIT</span>
            <p>{{ $article->user->name }}</p>
        </div>

        @if ($article->user_id === auth()->id())
            <a href="{{ route('articles.edit', $article) }}"
               class="button-primary">
                Edit Artikel
            </a>
        @endif

    </footer>

</article>

<div class="detail-back">
    <a href="{{ route('articles.index') }}">← Kembali ke Daftar Artikel</a>
</div>

@endsection
