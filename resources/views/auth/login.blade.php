@extends('layouts.app')

@section('title', 'Login — Portal Berita Sederhana')

@section('content')
    <div class="card">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus style="max-width: 260px;">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required style="max-width: 260px;">
            </div>

            <div class="form-group">
                <label style="font-weight: 400; display: inline-flex; align-items: center; gap: 6px;">
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <button type="submit" class="btn">Masuk</button>
            <p class="muted" style="font-size: 11px; margin-top: 8px;">
                Belum punya akun? <a href="{{ route('register') }}" class="link">Daftar</a>
            </p>
        </form>
    </div>
@endsection