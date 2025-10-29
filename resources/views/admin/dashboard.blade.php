@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center mb-4">Dashboard Admin</h1>
            <p class="text-center">Selamat datang, Admin!</p>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $userCount }}</h5>
                    <p class="card-text">Total user terdaftar</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Members</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $memberCount }}</h5>
                    <p class="card-text">Total member</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $categoryCount }}</h5>
                    <p class="card-text">Total kategori</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Payments</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $paymentCount }}</h5>
                    <p class="card-text">Total pembayaran</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
  <div class="card shadow-lg border-0">
    <!-- Header -->
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">🧾 Pemasukan</h5>
      <small>#PMK-2025</small>
    </div>

    <!-- Body -->
    <div class="card-body">
      <!-- Item 1 -->
      <div class="d-flex justify-content-between align-items-center border-bottom py-2">
        <div>
          <strong>Mingguan</strong><br>
          <small class="text-muted">Tanggal: 29 Okt 2025</small>
        </div>
        <span class="text-success fw-semibold">+Rp150.000</span>
      </div>

      <!-- Item 2 -->
      <div class="d-flex justify-content-between align-items-center border-bottom py-2">
        <div>
          <strong>Bulanan</strong><br>
          <small class="text-muted">Tanggal: 29 Okt 2025</small>
        </div>
        <span class="text-success fw-semibold">+Rp75.000</span>
      </div>

      <!-- Item 3 -->
      <div class="d-flex justify-content-between align-items-center border-bottom py-2">
        <div>
          <strong>Tahunan</strong><br>
          <small class="text-muted">Tanggal: 29 Okt 2025</small>
        </div>
        <span class="text-success fw-semibold">+Rp50.000</span>
      </div>
    </div>

    <!-- Total -->
    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
      <span class="fw-semibold text-secondary">Total Pemasukan:</span>
      <span class="fw-bold text-success fs-5">Rp275.000</span>
    </div>
  </div>
</div>
@endsection
