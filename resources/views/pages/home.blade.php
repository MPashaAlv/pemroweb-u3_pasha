@extends('layouts.app')

@section('title', 'Home — Portal Berita Sederhana')

@section('content')
    <div class="card">
        <h1>Portal Berita Sederhana</h1>
        <p style="margin: 0 0 12px;">
            Selamat datang di portal berita sederhana berbasis Laravel. Berita di bawah ini diambil dari tabel <code>articles</code>.
        </p>
        <p class="muted" style="margin: 0; font-size: 11px;">
            @auth
                Kamu login sebagai <strong>{{ Auth::user()->name }}</strong>. Kamu dapat menambah berita di menu <a href="{{ route('articles.index') }}" class="link">Artikel</a>.
            @else
                Kamu belum login. Untuk mengelola berita, silakan <a href="{{ route('login') }}" class="link">Login</a> atau <a href="{{ route('register') }}" class="link">Register</a>.
            @endauth
        </p>
    </div>

    <div class="card">
        <h2>Berita Terbaru</h2>

        @forelse ($articles as $article)
            <div class="article-item">
                <img src="{{ $article->image ?: 'https://picsum.photos/seed/' . $article->id . '/400/260' }}" alt="{{ $article->title }}">
                <div>
                    <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
                    <div class="muted" style="font-size: 11px; margin-bottom: 6px;">
                        Dipublikasikan pada {{ $article->created_at->format('d M Y') }} oleh {{ $article->user->name }}
                    </div>
                    <p style="margin: 0 0 8px; font-size: 13px; color: #334155;">
                        {{ Str::limit($article->body, 145) }}
                    </p>
                    <a href="{{ route('articles.show', $article) }}" class="link" style="font-size: 13px; font-weight: 500;">
                        Baca selengkapnya →
                    </a>
                </div>
            </div>
        @empty
            <p class="muted">Belum ada berita.</p>
        @endforelse
    </div>
@endsection