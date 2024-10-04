@extends('layouts.register_app')
@section('title', 'Ro\'yxatdan o\'tish')

@section('content')
<div class="auth-container">
    <h2 class="text-center mb-4">Ro'yxatdan o'tish</h2>
    <form action="{{route('handleRegister')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Foydalanuvchi nomi</label>
            <input type="text" class="form-control" id="username" value="{{old('name')}}" name="name" required>
        </div>
        @error('name')
            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="email" class="form-label">Elektron pochta</label>
            <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" required>
        </div>
        @error('email')
            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="password" class="form-label">Parol</label>
            <input type="password" class="form-control" id="password" value="{{old('password')}}" name="password" required>
        </div>
        @error('password')
        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Parolni tasdiqlang</label>
            <input type="password" class="form-control" id="confirmPassword" value="{{old('confirm_password')}}" name="confirm_password" required>
        </div>
        @error('confirm_password')
            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary w-100">Ro'yxatdan o'tish</button>
    </form>
    <p class="mt-3 text-center">Hisobingiz bormi? <a href="{{route('loginForm')}}">Kirish</a></p>
</div>
@endsection