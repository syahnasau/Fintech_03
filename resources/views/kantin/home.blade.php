@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-9">

                <h3 class="fw-bold mb-5">Admin</h3>
        
                <div class="mb-3">
        
                    <div class="card bg-white ">
                        <div class="card-header">
                            <div class="row ">
                                <div class="col d-flex justify-content-start">
                                    <h4>All Product </h4>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <a href="" class="btn btn-primary">Add New Product</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Image</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>Rp. {{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->photo }}</td>
                                            <td>{{ $product->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                    <div class="card bg-white mt-3">
                        <div class="card-header">
                            <div class="row ">
                                <div class="col d-flex justify-content-start">
                                    <h4>All Users </h4>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <a href="" class="btn btn-primary">Add New Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Image</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>Rp. {{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->photo }}</td>
                                            <td>{{ $product->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
        
                
            </div>

        </div>
    </div>
@endsection