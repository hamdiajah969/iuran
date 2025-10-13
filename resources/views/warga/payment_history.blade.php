@extends('layouts.warga')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-12">
            <h1 class="text-center mb-4">Payment History</h1>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nominal</th>
                                    <th>Period</th>
                                    <th>Petugas</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Nominal Tagihan</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->nominal }}</td>
                                    <td>{{ $payment->duesCategory->period ?? 'N/A' }}</td>
                                    <td>{{ $payment->petugas }}</td>
                                    <td>{{ $payment->jumlah_tagihan }}</td>
                                    <td>{{ $payment->nominal_tagihan }}</td>
                                    <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No payment history found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
