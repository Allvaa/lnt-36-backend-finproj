@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Data Kategori</h1>

    <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 px-4 py-2 rounded mb-4 inline-block">
        Tambah Kategori
    </a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Nama Kategori</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="border p-2">{{ $category->id }}</td>
                <td class="border p-2">{{ $category->name }}</td>
                <td class="border p-2 flex gap-2">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-yellow-400 px-2 py-1 rounded">Edit</a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 px-2 py-1 rounded" onclick="return confirm('Yakin hapus kategori ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
