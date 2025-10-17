@extends('layouts.admin')

@section('content')
<h1>Edit Anggota</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.members.update', $member->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="users_id" class="form-label">User</label>
        <select class="form-select" id="users_id" name="users_id" required>
            <option value="">Pilih Pengguna</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ old('users_id', $member->users_id) == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->username }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="dues_categories_id" class="form-label">Category</label>
        <select class="form-select" id="dues_categories_id" name="dues_categories_id" required>
            <option value="">Pilih Kategori</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('dues_categories_id', $member->dues_categories_id) == $category->id ? 'selected' : '' }}>{{ $category->period }} - {{ $category->nominal }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="registration_date" class="form-label">Tanggal Pendaftaran</label>
        <input type="date" class="form-control" id="registration_date" name="registration_date" value="{{ old('registration_date', $member->registration_date) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.members') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
