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
                    <p class="card-text">Total registered users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Members</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $memberCount }}</h5>
                    <p class="card-text">Total members</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $categoryCount }}</h5>
                    <p class="card-text">Total categories</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Payments</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $paymentCount }}</h5>
                    <p class="card-text">Total payments</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
