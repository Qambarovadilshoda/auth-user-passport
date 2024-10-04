@extends('layouts.register_app')
@section('title', 'Kirish')

@section('content')
    <div class="auth-container">
    <h2 class="text-center mb-4">Kirish</h2>
    <form action="{{route('handleLogin')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Elektron pochta</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        @error('email')
            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="password" class="form-label">Parol</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        @error('password')
            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Kirish</button>
    </form>
    <p class="mt-3 text-center">Hisobingiz yo'qmi? <a href="{{route('registerForm')}}">Ro'yxatdan o'tish</a></p>
    </div>
@endsection