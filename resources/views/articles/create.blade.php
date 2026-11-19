
@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')

<section class="form-page">

    <div class="form-heading">
        <span class="eyebrow">KREASI KONTEN</span>
        <h1>Tulis Cerita Baru<span>.</span></h1>
        <p>Bagikan informasi dan wawasan melalui artikel baru.</p>
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

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="form-field">
                <label for="title">Judul Artikel</label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="Masukkan judul artikel..."
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
                       value="{{ old('image') }}"
                       placeholder="https://example.com/gambar.jpg">
                <small>Gunakan URL gambar yang dapat diakses publik.</small>
                @error('image')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-field">
                <label for="body">Isi Artikel</label>
                <textarea id="body"
                          name="body"
                          rows="12"
                          placeholder="Mulai tulis artikel kamu di sini..."
                          required>{{ old('body') }}</textarea>
                @error('body')
                    <small class="field-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="editor-actions">
                <a href="{{ route('articles.index') }}" class="button-secondary">
                    Batal
                </a>

                <button type="submit" class="button-primary">
                    Publikasikan Artikel ↗
                </button>
            </div>

        </form>

    </div>

</section>

@endsection
