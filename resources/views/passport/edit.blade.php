@extends('layouts.app')
@section('title' , 'Edit Passport')

@section('content')
@include('partials.navbar')
<div class="container mt-5">
    <h1 class="mb-4">Passport ma'lumotlarini tahrirlash</h1>
    <form action="{{route('passports.update', $passport->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="passport_number" class="form-label">Passport raqami</label>
            <input type="text" class="form-control" id="passport_number" name="passport_number" value="{{$passport->passport_number}}"
                required>
        </div>
        @error('passport_number')
        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="issue_date" class="form-label">Berilgan sana</label>
            <input type="date" class="form-control" id="issue_date" name="issue_date" value="{{$passport->issue_date}}" required>
        </div>
        @error('issue_date')
        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="expiry_date" class="form-label">Amal qilish muddati</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{$passport->expiry_date}}" required>
        </div>
        @error('expiry_date')
        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a class="btn btn-secondary" href="{{route('home')}}">Ortga</a>
    </form>
</div>

@endsection