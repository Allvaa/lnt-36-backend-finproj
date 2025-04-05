@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Kategori</label>
            <select name="category_id" class="w-full border p-2 rounded" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Harga</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required
                class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Stok</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required
                class="w-full border p-2 rounded">
        </div>

        </div>

        <div>
            <label class="block mb-1 font-semibold">Gambar Produk</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk" class="w-32 mt-2">
            @endif
        </div>

        <button type="submit" class="bg-yellow-500 px-4 py-2 rounded">Update Produk</button>
    </form>
</div>
@endsection
