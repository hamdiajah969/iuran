@extends('layouts.admin')

@section('content')
<h1>Create User</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="nohp" class="form-label">Phone</label>
        <input type="text" class="form-control" id="nohp" name="nohp" value="{{ old('nohp') }}" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
    </div>
    <div class="mb-3">
        <label for="level" class="form-label">Level</label>
        <select class="form-select" id="level" name="level" required>
            <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="officer" {{ old('level') == 'officer' ? 'selected' : '' }}>Officer</option>
            <option value="warga" {{ old('level') == 'warga' ? 'selected' : '' }}>Warga</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
