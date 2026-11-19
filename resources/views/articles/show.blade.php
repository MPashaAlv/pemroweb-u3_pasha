@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="card">
        <h1>{{ $article->title }}</h1>
        <div class="muted" style="font-size: 11px; margin-bottom: 16px;">
            Dipublikasikan pada {{ $article->created_at->format('d M Y') }} oleh {{ $article->user->name }}
        </div>

        <img src="{{ $article->image ?: 'https://picsum.photos/seed/' . $article->id . '/800/420' }}"
             alt="{{ $article->title }}"
             style="width: 100%; max-height: 360px; object-fit: cover; border-radius: 8px; margin-bottom: 18px;">

        <div style="font-size: 14px; color: #334155; white-space: pre-line; margin-bottom: 20px;">{{ $article->body }}</div>

        <div style="font-size: 13px;">
            <a href="{{ route('home') }}" class="link">← Kembali ke Home</a>
            @auth
                | <a href="{{ route('articles.index') }}" class="link">Lihat semua artikel</a>
            @endauth
        </div>
    </div>
@endsection