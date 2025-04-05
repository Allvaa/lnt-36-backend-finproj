@extends('layouts.app')

@section('title', 'Detail Invoice')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Invoice #{{ $invoice->invoice_number }}</h1>

    <div class="mb-4">
        <p><strong>Nama Pembeli:</strong> {{ $invoice->user->name }}</p>
        <p><strong>Alamat:</strong> {{ $invoice->address }}</p>
        <p><strong>Kode Pos:</strong> {{ $invoice->postal_code }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($invoice->total_price, 0, ',', '.') }}</p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Detail Produk:</h2>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Qty</th>
                <th class="border p-2">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td class="border p-2">{{ $item->product_name }}</td>
                <td class="border p-2">{{ $item->quantity }}</td>
                <td class="border p-2">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('catalog') }}" class="mt-4 inline-block bg-blue-500 px-4 py-2 rounded">
        Kembali Belanja
    </a>
</div>
@endsection
