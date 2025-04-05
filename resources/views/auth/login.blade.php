@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mx-auto max-w-md p-4">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div>
            <input type="email" name="email" placeholder="Email" required
                class="w-full border p-2 rounded">
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" required
                class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="w-full bg-blue-500 py-2 rounded">
            Login
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
    </div>
</div>
@endsection
