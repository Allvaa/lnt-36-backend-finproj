@extends('layouts.app')

@section('title', 'Katalog Barang')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Katalog Barang</h1>

    {{-- Tombol ke Halaman Cart --}}
    <div class="text-end mb-3">
        <a href="{{ route('cart.view') }}" class="btn btn-primary">
            <i class="bi bi-cart"></i> Lihat Keranjang
        </a>
    </div>

    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $product->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp{{ number_format($product->price) }}</p>
                        <p class="card-text">
                            Stock: {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                        </p>

                        @if($product->stock > 0)
                        {{-- Form Add to Cart --}}
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success mt-2">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
