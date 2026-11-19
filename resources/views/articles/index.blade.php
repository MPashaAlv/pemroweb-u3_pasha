
@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')

<section class="page-heading">
    <div>
        <span class="eyebrow">PUSAT MANAJEMEN KONTEN</span>
        <h1>Semua Artikel<span>.</span></h1>
        <p>Jelajahi dan kelola seluruh berita yang tersedia.</p>
    </div>

    <a href="{{ route('articles.create') }}" class="button-primary">
        + Artikel Baru
    </a>
</section>

@if (session('success'))
    <div class="flash-message">
        {{ session('success') }}
    </div>
@endif

<section class="article-list-panel">

    <div class="section-header">
        <div>
            <span class="eyebrow">ARSIP BERITA</span>
            <h2>Daftar Publikasi</h2>
        </div>
        <span class="section-note">
            {{ $articles->total() }} Artikel
        </span>
    </div>

    @if ($articles->isNotEmpty())

        <div class="article-table">

            @foreach ($articles as $article)

                <article class="article-list-item">

                    <a href="{{ route('articles.show', $article) }}"
                       class="list-thumbnail">
                        <img src="{{ $article->image_url }}"
                             alt="{{ $article->title }}"
                             loading="lazy">
                    </a>

                    <div class="list-content">

                        <span class="article-information">
                            {{ $article->created_at->format('d M Y') }}
                            · {{ $article->user->name }}
                        </span>

                        <h3>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                        </p>

                    </div>

                    <div class="list-actions">

                        <a href="{{ route('articles.show', $article) }}"
                           class="action-view">
                            Lihat
                        </a>

                        @if ($article->user_id === auth()->id())

                            <a href="{{ route('articles.edit', $article) }}"
                               class="action-edit">
                                Edit
                            </a>

                            <form action="{{ route('articles.destroy', $article) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="action-delete">
                                    Hapus
                                </button>
                            </form>

                        @endif

                    </div>

                </article>

            @endforeach

        </div>

        <div class="pagination-wrapper">
            {{ $articles->links('pagination::default') }}
        </div>

    @else

        <div class="dashboard-empty">
            <span>✳</span>
            <h3>Belum Ada Artikel</h3>
            <p>Belum ada berita yang tersedia dalam sistem.</p>
            <a href="{{ route('articles.create') }}" class="button-primary">
                Tambah Artikel
            </a>
        </div>

    @endif

</section>

@endsection
