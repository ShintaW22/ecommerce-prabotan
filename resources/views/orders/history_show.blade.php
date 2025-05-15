@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-0">Detail Riwayat Pesanan #{{ $order->id }}</h1>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Detail Pesanan</h5>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $order->status === 'completed' ? 'success' : ($order->status === 'cancelled' ? 'danger' : 'warning') }}">{{ ucfirst($order->status) }}</span></p>
                    <p><strong>Nomor Resi:</strong> {{ $order->resi ?? '-' }}</p>
                    <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                    <p><strong>Total:</strong> Rp{{ number_format($order->total_amount, 0, ',', '.') }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Informasi Pengiriman</h5>
                    <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                    <p><strong>Telepon:</strong> {{ $order->customer_phone }}</p>
                    <p><strong>Alamat:</strong> {{ $order->shipping_address }}</p>
                </div>
            </div>

            <h5>Daftar Produk</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td><strong>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('orders.history') }}" class="btn btn-secondary">Kembali ke Riwayat</a>
            </div>
        </div>
    </div>
@endsection 