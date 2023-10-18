@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            @if(session('status'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row pb-4">

                <div class="col">
                    <div class="card shadow-sm border border-none bg-white">
                        <div class="card-header">Welcome, {{ Auth::user()->name }}</div>
        
                        <div class="card-body ">
                            <div class="row">
                                <div class="col">
                                    <div class="fw-bold fs-5" style="">
                                        <i class="bi bi-wallet2 pe-2"></i>
                                        Balance : Rp. {{ $saldo }}
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <button type="button" class="btn btn-primary" data-bs-target="#formTopUp" data-bs-toggle="modal">Top Up</button>

                                    <!-- Modal -->
                                <form action="{{route('topUpNow')}}" method="post">
                                    @csrf
                                
                                    <div class="modal fade" id="formTopUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Enter the Top Up nominal</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="number" name="credit" id="" class="form-control" min="10000" value="10000">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Top Up Now</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-4">

                <div class="col">
                    <div class="card shadow-sm border border-none bg-white">
                        <div class="card-header">Product Tenizen Mart</div>
                        <div class="card-body ">
                           <div class="row">
                            @foreach ($products as $product)
                            <div class="col-md-4 col-sm-6 p-2">
                                <form action="{{ route('addToCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <div class="card bg-white">
                                        <div class="card-header">
                                            {{ $product->name }}
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ $product->photo }}" alt="" width="200" height="150" class="text-center py-2">
                                            <div>{{ $product->description }}</div>
                                            <div class="">Price: Rp. {{ $product->price }}</div>
                                            <div class="text-reset">Stock : {{$product->stock}}</div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-5 d-flex justify-content-start">
                                                    <div>
                                                        <input class="form-control" type="number" name="quantity" value="0" min="0" id="">
                                                    </div>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endforeach
                            
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- - SideBar - --}}
        <div class="col">
            <div class="row pb-4">
                <div class="">
                    <div class="card shadow-sm border  border-none bg-white">
                        <div class="card-header">Your Basket</div>
                        <div class="card-body ">
                            <ul>
                                @foreach ($carts as $key => $cart)
                                    <li>
                                        {{$cart->product->name}} | {{$cart->quantity}} * {{$cart->price}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">   
                            <div class="fw-bold">

                                Total Biaya : {{ $total_biaya }}
                            </div>
                            <div class=" py-2">
                                <form action="{{route('payNow')}}" method="post">
                                    @csrf
                                    <button href="{{route('payNow')}}" type="submit" class="btn btn-success">Pay Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="">
                    {{-- <div class="card shadow-sm border  border-none bg-white">
                        <div class="card-header">Mutation Wallet</div>
                        <div class="card-body ">
                            <ul>
                                @foreach ($mutasi as $data)
                                    <li>
                                        {{ $data->credit ? $data->credit : 'Debit' }} | {{ $data->debit ? $data->debit : 'Kredit' }} | {{ $data->description }}
                                        @if ($data->status == 'proses')
                                            <span class="badge text-bg-warning">PROSES</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            
                        </div>
                    </div> --}}
                    <div class="card shadow-sm bg-white">
                        <div class="card-header">Mutation Wallet</div>
                        <div class="card-body table-responsive">
                          <table class="table table-default">
                            <thead>
                              <tr>
                                <th scope="col">Credit</th>
                                <th scope="col">Debit</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($mutasi as $data)
                                <tr>
                                  <td>{{ $data->credit ? $data->credit : 'Debit' }}</td>
                                  <td>{{ $data->debit ? $data->debit : 'Kredit' }}</td>
                                  <td>{{ $data->description }}</td>
                                  <td>
                                    @if ($data->status == 'proses')
                                      <span class="badge text-bg-warning">PROSES</span>
                                    @endif
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="">
                    <div class="card shadow-sm border  border-none bg-white">
                        <div class="card-header">Transaction History</div>
                        <div class="card-body ">
                            <ul>
                                @foreach ($transactions as $key => $transaction)
                                    <div class="row ">
                                        <div class="col">
                                            <div class="row ">
                                                <div class="col">
                                                    {{ $transaction[0]->order_id }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    {{ $transaction[0]->created_at }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('download', ['order_id' => $transaction[0]->order_id ]) }}" class="btn btn-success" target="_blank">Download</a>
                                            {{-- <a href="{{ route('download', ['order_id' => $transaction[0]->order_id]) }}" class="btn btn-dark" style="background-color: #213555;" target="_blank">
                                                Download
                                            </a> --}}
                                        </div>
                                        
                                    </div>
                                    @endforeach

                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="row"></div>

</div>
@endsection
