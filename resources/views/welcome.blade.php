@extends('layouts.app')
@section('title' , 'Bosh Sahifa')

@section('content')
@include('partials.navbar')
<div class="container mt-5">
    @if (auth()->check() && !empty(auth()->user()->passport))
    <h1 class="mb-4">Xush kelibsiz!</h1>
    <p>Passport ma'lumotlaringizni ko'rish uchun quyidagi tugmadan foydalaning:</p>
    <div class="mt-4">
        <a href="{{route('passports.show', auth()->user()->passport->id)}}" class="btn btn-secondary">
            <i class="fas fa-eye"></i> Passport ma'lumotlarini ko'rish
        </a>
    </div>
    @elseif (auth()->check() && empty(auth()->user()->passport))
    <h1 class="mb-4">Xush kelibsiz!</h1>
    <p>Passport ma'lumotlaringizni kiritish uchun quyidagi tugmadan foydalaning:</p>
    <a href="{{route('passports.create')}}" class="btn btn-primary me-2">
        <i class="fas fa-plus-circle"></i> Passport ma'lumotlarini kiriting
    </a>
    @else
    <h4 class="mb-4">Tizimdan foydalanish uchun avval registratsiyadan o'ting!</h4>
    @endif
</div>
@endsection