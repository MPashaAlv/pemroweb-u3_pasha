@extends('layouts.app')

@section('title', 'Daftar Artikel — Portal Berita Sederhana')

@section('content')
    <div class="card">
        <h1>Daftar Artikel</h1>
        <p style="margin: 0 0 14px;">
            <a href="{{ route('articles.create') }}" class="link">+ Artikel Baru</a>
        </p>

        @if ($articles->count())
            <ul style="padding-left: 20px; line-height: 2.1; margin: 0;">
                @foreach ($articles as $article)
                    <li>
                        <a href="{{ route('articles.show', $article) }}" class="link">{{ $article->title }}</a>
                        <span class="muted">oleh {{ $article->user->name }}</span>

                        @if ($article->user_id === Auth::id())
                            <a href="{{ route('articles.edit', $article) }}" class="link" style="margin-left: 6px;">Edit</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="margin-left: 4px;">Hapus</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>

            {{ $articles->links('pagination::default') }}
        @else
            <p>Belum ada artikel.</p>
        @endif
    </div>
@endsection