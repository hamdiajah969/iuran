@extends('layouts.admin')

@section('content')
<h1>Payment Detail</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Payment ID: {{ $payment->id }}</h5>
        <p class="card-text"><strong>User:</strong> {{ $payment->user->name ?? 'N/A' }} ({{ $payment->user->username ?? 'N/A' }})</p>
        <p class="card-text"><strong>Nominal:</strong> {{ $payment->nominal }}</p>
        <p class="card-text"><strong>Period:</strong> {{ $payment->period }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $payment->duesCategory->period ?? 'N/A' }}</p>
        <p class="card-text"><strong>Petugas:</strong> {{ $payment->petugas }}</p>
        <p class="card-text"><strong>Jumlah Tagihan:</strong> {{ $payment->jumlah_tagihan }}</p>
        <p class="card-text"><strong>Nominal Tagihan:</strong> {{ $payment->nominal_tagihan }}</p>
        <p class="card-text"><strong>Created At:</strong> {{ $payment->created_at }}</p>
        <p class="card-text"><strong>Updated At:</strong> {{ $payment->updated_at }}</p>
    </div>
</div>

<a href="{{ route('admin.payments') }}" class="btn btn-secondary mt-3">Back to Payments</a>
@endsection
