@extends('layouts.app')

@section('title', 'Tambah Artikel — Portal Berita Sederhana')

@section('content')
    <div class="card">
        <h1>Tambah Artikel / Berita</h1>
        <p class="muted" style="font-size: 11px; margin-bottom: 18px;">
            Isi formulir di bawah untuk menambahkan berita baru. Gambar menggunakan URL (opsional); jika kosong, sistem memakai placeholder online.
        </p>

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label>URL Gambar (opsional)</label>
                <input type="url" name="image" value="{{ old('image') }}" placeholder="https://example.com/gambar.jpg">
                <div class="muted" style="font-size: 11px; margin-top: 4px;">
                    Jika dikosongkan, sistem memakai gambar placeholder dari <code>picsum.photos</code>.
                </div>
            </div>

            <div class="form-group">
                <label>Isi Berita</label>
                <textarea name="body" rows="6" required>{{ old('body') }}</textarea>
            </div>

            <button type="submit" class="btn">Simpan Artikel</button>
            <a href="{{ route('articles.index') }}" class="link" style="margin-left: 10px;">Batal</a>
        </form>
    </div>
@endsection