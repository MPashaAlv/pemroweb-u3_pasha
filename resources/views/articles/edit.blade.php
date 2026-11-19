@extends('layouts.app')

@section('title', 'Edit Artikel — Portal Berita Sederhana')

@section('content')
    <div class="card">
        <h1>Edit Artikel / Berita</h1>
        <p class="muted" style="font-size: 11px; margin-bottom: 18px;">
            Perbarui data berita di bawah ini. Kosongkan URL gambar untuk kembali memakai gambar placeholder.
        </p>

        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" required>
            </div>

            <div class="form-group">
                <label>URL Gambar (opsional)</label>
                <input type="url" name="image" value="{{ old('image', $article->image) }}" placeholder="https://example.com/gambar.jpg">
            </div>

            <div class="form-group">
                <div class="muted" style="font-size: 11px; margin-bottom: 6px;">Pratinjau gambar saat ini:</div>
                <img src="{{ $article->image ?: 'https://picsum.photos/seed/' . $article->id . '/800/400' }}"
                     alt="Pratinjau"
                     style="width: 340px; max-width: 100%; height: 190px; object-fit: cover; border-radius: 8px;">
            </div>

            <div class="form-group">
                <label>Isi Berita</label>
                <textarea name="body" rows="6" required>{{ old('body', $article->body) }}</textarea>
            </div>

            <button type="submit" class="btn">Update Artikel</button>
            <a href="{{ route('articles.index') }}" class="link" style="margin-left: 10px;">Batal</a>
        </form>
    </div>
@endsection