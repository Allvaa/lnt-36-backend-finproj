@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Kategori</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-semibold">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-500 px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
