@extends('beranda.layouts')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 text-center">
        <div class="hero-section py-5">
            <h1 class="display-4 fw-bold text-success mb-4">Selamat Datang di Sistem Iuran Warga</h1>
            <p class="lead text-muted mb-4">Sistem terintegrasi untuk mengelola iuran warga dengan mudah dan efisien. Kelola pembayaran, kategori iuran, dan data warga dalam satu platform.</p>
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">Pembayaran Mudah</h5>
                            <p class="card-text">Proses pembayaran iuran yang cepat dan aman untuk semua warga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">Manajemen Data</h5>
                            <p class="card-text">Kelola data warga, petugas, dan kategori iuran dengan sistematis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-success">
                        <div class="card-body">
                            <h5 class="card-title text-success">Laporan Real-time</h5>
                            <p class="card-text">Pantau status pembayaran dan generate laporan kapan saja.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
