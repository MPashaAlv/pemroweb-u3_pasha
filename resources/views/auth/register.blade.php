@extends('layouts.app')

@section('title', 'Register — Portal Berita Sederhana')

@section('content')
    <div class="card">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus style="max-width: 260px;">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required style="max-width: 260px;">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required style="max-width: 260px;">
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required style="max-width: 260px;">
            </div>

            <button type="submit" class="btn">Daftar</button>
            <p class="muted" style="font-size: 11px; margin-top: 8px;">
                Sudah punya akun? <a href="{{ route('login') }}" class="link">Login</a>
            </p>
        </form>
    </div>
@endsection