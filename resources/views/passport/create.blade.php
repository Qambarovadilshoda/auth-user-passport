@extends('layouts.app')
@section('title' , 'Create Passport')

@section('content')
@include('partials.navbar')
<div class="container mt-5">
    <h1 class="mb-4">Passport ma'lumotlarini kiriting</h1>
    <form action="{{route('passports.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="passport_number" class="form-label">Passport raqami</label>
            <input type="text" class="form-control" id="passport_number" value="{{old('passport_number')}}" name="passport_number" required>
        </div>
        @error('passport_number')
        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="issue_date" class="form-label">Berilgan sana</label>
            <input type="date" class="form-control" id="issue_date" value="{{old('issue_date')}}" name="issue_date"required>
        </div>
        @error('issue_date')
        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <div class="mb-3">
            <label for="expiry_date" class="form-label">Amal qilish muddati</label>
            <input type="date" class="form-control" id="expiry_date" value="{{old('expiry_date')}}" name="expiry_date" required>
        </div>
        @error('expiry_date')
        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a class="btn btn-secondary" href="{{route('home')}}">Ortga</a>
    </form>
</div>

@endsection