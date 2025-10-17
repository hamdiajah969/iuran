@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center mb-4">Payments</h1>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Nominal</th>
                                    <th>Period</th>
                                    <th>Petugas</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $payment->user->name ?? 'N/A' }}</td>
                                    <td>{{ $payment->nominal }}</td>
                                    <td>{{ $payment->period }}</td>
                                    <td>{{ $payment->petugas }}</td>
                                    <td>{{ $payment->jumlah_tagihan }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.payments.detail', $payment->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        <form action="{{ route('admin.payments.delete', $payment->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('admin.payments.create') }}" class="btn btn-success mt-3">Bayar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
