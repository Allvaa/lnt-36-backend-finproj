@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mx-auto max-w-md p-4">
    <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <input type="text" name="name" placeholder="Nama Lengkap" required
                class="w-full border p-2 rounded">
        </div>

        <div>
            <input type="email" name="email" placeholder="Email (@gmail.com)" required
                class="w-full border p-2 rounded">
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" required
                class="w-full border p-2 rounded">
        </div>

        <div>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required
                class="w-full border p-2 rounded">
        </div>

        <div>
            <input type="text" name="phone" placeholder="Nomor HP (08xxx)" required
                class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="w-full bg-green-500 py-2 rounded">
            Register
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Sudah punya akun? Login</a>
    </div>
</div>
@endsection
