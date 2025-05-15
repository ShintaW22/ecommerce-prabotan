@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="lead">{{ $product->description }}</p>
            <p class="h3 mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="mb-4">Stok tersedia: {{ $product->stock }}</p>

            @auth
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ auth()->user()->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="customer_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="customer_email" name="customer_email" value="{{ auth()->user()->email }}" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="customer_phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="customer_phone" name="customer_phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="{{ $product->stock }}" value="1" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                </form>
            @else
                <div class="alert alert-info">
                    Silakan <a href="{{ route('login') }}">masuk</a> atau <a href="{{ route('register') }}">daftar</a> untuk melakukan pemesanan.
                </div>
            @endauth
        </div>
    </div>
@endsection 