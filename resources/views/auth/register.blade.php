
@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')

<section class="auth-page">

    <div class="auth-visual">

        <div class="auth-visual-top">
            <span class="eyebrow">PORTAL BERITA DIGITAL</span>
            <span class="auth-number">02 / 02</span>
        </div>

        <div class="auth-visual-content">

            <span class="auth-symbol">✳</span>

            <h1>
                Setiap cerita
                <span>layak dibagikan.</span>
            </h1>

            <p>
                Bergabunglah dan mulai bagikan gagasan,
                informasi, serta perspektif melalui tulisan.
            </p>

        </div>

        <div class="auth-visual-bottom">
            <span>INFORMASI · INSPIRASI · PERSPEKTIF</span>
            <span>BY M.PASHA</span>
        </div>

    </div>


    <div class="auth-form-area">

        <div class="auth-form-container">

            <a href="{{ route('home') }}" class="auth-back">
                ← Kembali ke Beranda
            </a>

            <div class="auth-heading">
                <span class="eyebrow">MULAI PERJALANANMU</span>
                <h2>Buat Akun<span>.</span></h2>
                <p>Lengkapi informasi berikut untuk membuat akun baru.</p>
            </div>

            @if ($errors->any())
                <div class="form-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-field">
                    <label for="name">Nama Lengkap</label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama lengkap"
                           autocomplete="name"
                           required>
                    @error('name')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="email">Alamat Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="nama@email.com"
                           autocomplete="email"
                           required>
                    @error('email')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="password">Kata Sandi</label>
                    <input type="password"
                           id="password"
                           name="password"
                           placeholder="Minimal 8 karakter"
                           autocomplete="new-password"
                           required>
                    @error('password')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           placeholder="Ulangi kata sandi"
                           autocomplete="new-password"
                           required>
                </div>

                <button type="submit" class="auth-submit">
                    Buat Akun <span>↗</span>
                </button>

            </form>

            <div class="auth-switch">
                Sudah mempunyai akun?
                <a href="{{ route('login') }}">Masuk sekarang</a>
            </div>

            <div class="auth-copyright">
                © {{ date('Y') }} Portal Berita · M.Pasha
            </div>

        </div>

    </div>

</section>

@endsection
