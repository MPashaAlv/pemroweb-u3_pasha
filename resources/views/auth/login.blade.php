
@extends('layouts.app')

@section('title', 'Masuk')

@section('content')

<section class="auth-page">

    <div class="auth-visual">

        <div class="auth-visual-top">
            <span class="eyebrow">PORTAL BERITA DIGITAL</span>
            <span class="auth-number">01 / 02</span>
        </div>

        <div class="auth-visual-content">

            <span class="auth-symbol">✳</span>

            <h1>
                Informasi yang baik
                <span>dimulai dari sini.</span>
            </h1>

            <p>
                Masuk dan temukan ruang untuk membaca,
                berbagi, serta mengembangkan informasi.
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
                <span class="eyebrow">SELAMAT DATANG KEMBALI</span>
                <h2>Masuk<span>.</span></h2>
                <p>Silakan masuk menggunakan akun yang telah terdaftar.</p>
            </div>

            @if ($errors->any())
                <div class="form-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

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
                           placeholder="Masukkan kata sandi"
                           autocomplete="current-password"
                           required>
                    @error('password')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <label class="remember-option">
                    <input type="checkbox" name="remember" value="1">
                    <span>Ingat saya</span>
                </label>

                <button type="submit" class="auth-submit">
                    Masuk ke Akun <span>↗</span>
                </button>

            </form>

            <div class="auth-switch">
                Belum mempunyai akun?
                <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>

            <div class="auth-copyright">
                © {{ date('Y') }} Portal Berita · M.Pasha
            </div>

        </div>

    </div>

</section>

@endsection
