<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background: white">
    <div id="app">
    
        <main class="py-4">
            <div class="card">
                <div class="card-header">
                    <h3>e-Receipt #{{$transactions[0]->order_id}}</h3>
                    <span>#{{ $transactions[0]->created }}</span>
                </div>
                <div class="card-body">
                    @foreach ($transactions as $transaction )
                    <div class="row">
                        <div class="col-2">
                            {{ $transaction->quantity }} x 
                        </div>
                        <div class="col-10 text-end">
                            {{ $transaction->price }}
                        </div>
                    </div>
                        
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="">
                        <div class="row">
                            <div class="col text-end">
                                {{ $total_biaya }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
