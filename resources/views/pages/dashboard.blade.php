@extends('layouts.app')

@section('title', 'Dashboard — Portal Berita Sederhana')

@section('content')
    <div class="card">
        <h1>Dashboard</h1>
        <p style="margin: 0 0 10px;">Selamat datang, <strong>{{ $user->name }}</strong></p>
        <p class="muted" style="margin: 0; font-size: 11px;">Ini adalah ringkasan singkat aktivitas artikel di aplikasi kamu.</p>
    </div>

    <div class="card">
        <h2>Total Artikel</h2>
        <div style="font-size: 22px; font-weight: 600;">{{ $totalArticles }}</div>
        <p class="muted" style="margin: 4px 0 0; font-size: 11px;">Jumlah seluruh artikel yang ada di sistem.</p>
    </div>

    <div class="card">
        <h2>Artikel Kamu</h2>
        <div style="font-size: 22px; font-weight: 600;">{{ $myArticles }}</div>
        <p class="muted" style="margin: 4px 0 0; font-size: 11px;">Artikel yang dibuat oleh akun kamu.</p>
    </div>

    <div class="card">
        <h2>Aksi Cepat</h2>
        <ul style="margin: 0; padding-left: 20px; line-height: 2;">
            <li><a href="{{ route('articles.create') }}" class="link">+ Tambah Artikel Baru</a></li>
            <li><a href="{{ route('articles.index') }}" class="link">Lihat Semua Artikel</a></li>
            <li><a href="{{ route('home') }}" class="link">Lihat Halaman Home</a></li>
        </ul>
    </div>

    <div class="card">
        <h2>Artikel Terbaru</h2>
        @forelse ($latestArticles as $item)
            <div class="article-item" style="padding: 10px;">
                <img src="{{ $item->image ?: 'https://picsum.photos/seed/' . $item->id . '/300/200' }}" alt="{{ $item->title }}" style="width: 110px; height: 75px;">
                <div>
                    <h3 style="font-size: 15px;"><a href="{{ route('articles.show', $item) }}">{{ $item->title }}</a></h3>
                    <div class="muted" style="font-size: 11px; margin-bottom: 4px;">
                        oleh {{ $item->user->name }} • {{ $item->created_at->format('d M Y') }}
                    </div>
                    <p style="margin: 0; font-size: 12px; color: #334155;">{{ Str::limit($item->body, 100) }}</p>
                </div>
            </div>
        @empty
            <p class="muted">Belum ada artikel.</p>
        @endforelse
    </div>

    <div class="card">
        <h2>Info Akun</h2>
        <ul style="margin: 0 0 12px; padding-left: 20px; font-size: 14px;">
            <li><strong>Nama:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
        </ul>
        <p class="muted" style="margin: 0; font-size: 11px;">Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.</p>
    </div>
@endsection