@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <input type="text" name="name" placeholder="Nama Produk" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <input type="number" name="price" placeholder="Harga" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <input type="number" name="stock" placeholder="Jumlah Stok" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <select name="category_id" class="w-full border p-2 rounded" required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
