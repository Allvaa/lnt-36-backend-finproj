@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Keranjang Belanja</h1>

    @if(session('success'))
        <div class="bg-green-200 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <table class="w-full table-auto border-collapse mb-4">
            <thead>
                <tr>
                    <th class="border p-2">Produk</th>
                    <th class="border p-2">Harga</th>
                    <th class="border p-2">Jumlah</th>
                    <th class="border p-2">Total</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td class="border p-2">{{ $item['name'] }}</td>
                    <td class="border p-2">Rp {{ number_format($item['price']) }}</td>
                    <td class="border p-2">{{ $item['qty'] }}</td>
                    <td class="border p-2">Rp {{ number_format($item['price'] * $item['qty']) }}</td>
                    <td class="border p-2">
                        <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-4">
            <strong>Total Belanja: Rp {{ number_format($total) }}</strong>
        </div>

        {{-- Form Checkout --}}
        <h2 class="text-xl font-bold mb-2">Data Pengiriman</h2>

        @if($errors->any())
            <div class="bg-red-200 p-2 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Alamat Lengkap</label>
                <input type="text" name="address" class="border p-2 w-full" placeholder="Masukkan alamat">
            </div>

            <div class="mb-4">
                <label>Kode Pos</label>
                <input type="text" name="postal_code" class="border p-2 w-full" placeholder="Masukkan kode pos">
            </div>

            {{-- Hidden input untuk qty --}}
            @foreach($cart as $item)
                <input type="hidden" name="quantities[{{ $item['product_id'] }}]" value="{{ $item['qty'] }}">
            @endforeach

            <button type="submit" class="bg-blue-500 px-4 py-2 rounded">
                Checkout Sekarang
            </button>
        </form>
    @else
        <p>Keranjang kosong.</p>
    @endif
</div>
@endsection
