
@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')

<section class="form-page">

    <div class="form-heading">
        <span class="eyebrow">PENGELOLAAN KONTEN</span>
        <h1>Perbarui Artikel<span>.</span></h1>
        <p>Perbarui informasi agar artikel tetap relevan.</p>
    </div>

    <div class="editor-card">

        @if ($errors->any())
            <div class="form-error">
                <strong>Periksa kembali formulir:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="form-field">
                <label for="title">Judul Artikel</label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $article->title) }}"
                       required>
                @error('title')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-field">
                <label for="image">URL Gambar <span>(Opsional)</span></label>
                <input type="url"
                       id="image"
                       name="image"
                       value="{{ old('image', $article->image) }}"
                       placeholder="https://example.com/gambar.jpg">
                <small>Kosongkan jika ingin kembali menggunakan gambar placeholder.</small>
                @error('image')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="current-image">
                <label>Gambar Saat Ini</label>
                <img src="{{ $article->image_url }}"
                     alt="Gambar artikel saat ini">
            </div>

            <div class="form-field">
                <label for="body">Isi Artikel</label>
                <textarea id="body"
                          name="body"
                          rows="12"
                          required>{{ old('body', $article->body) }}</textarea>
                @error('body')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="editor-actions">
                <a href="{{ route('articles.index') }}" class="button-secondary">
                    Batal
                </a>

                <button type="submit" class="button-primary">
                    Simpan Perubahan ↗
                </button>
            </div>

        </form>

    </div>

</section>

@endsection
