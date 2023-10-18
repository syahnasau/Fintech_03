@extends('admin.layouts.app')

@section('content')

<div class="card bg-white">
    <div class="card-header">

        <h4 class="">Tambah Produk Baru</h4>
    </div>
    
    <form  method="post" class="p-3">
        @csrf
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock">Stok:</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Tambah Produk</button>
    </form>
</div>

@endsection