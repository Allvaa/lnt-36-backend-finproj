@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

    <a href="{{ route('admin.products.create') }}" class="bg-blue-500  px-4 py-2 rounded inline-block mb-4">
        + Tambah Produk
    </a>

    @foreach($products as $product)
        <div class="border p-4 mb-2 rounded bg-white shadow">
            <p class="font-semibold">{{ $product->name }}</p>
            <p>Rp{{ number_format($product->price) }} | Stock: {{ $product->stock }}</p>

            <div class="flex space-x-2 mt-2">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-yellow-500 px-2 py-1 rounded">
                    Edit
                </a>

                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 px-2 py-1 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
