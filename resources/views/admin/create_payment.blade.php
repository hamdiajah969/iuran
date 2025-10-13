        @extends('layouts.admin')

@section('content')
<h1>Create Payment</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.payments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="users_id" class="form-label">User</label>
        <select class="form-select" id="users_id" name="users_id" required>
            <option value="">Select User</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ old('users_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->username }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="dues_categories_id" class="form-label">Category</label>
        <select class="form-select" id="dues_categories_id" name="dues_categories_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" data-period="{{ $category->period }}" data-nominal="{{ $category->nominal }}" {{ old('dues_categories_id') == $category->id ? 'selected' : '' }}>{{ $category->period }} - {{ $category->nominal }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal') }}" readonly required min="0">
    </div>
    <div class="mb-3">
        <label for="period" class="form-label">Period</label>
        <input type="text" class="form-control" id="period" name="period" value="{{ old('period') }}" readonly required>
    </div>
    <div class="mb-3">
        <label for="petugas" class="form-label">Petugas</label>
        <select class="form-select" id="petugas" name="petugas" required>
            <option value="">Select Petugas</option>
            <option value="admin" {{ old('petugas') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="officer" {{ old('petugas') == 'officer' ? 'selected' : '' }}>Officer</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Payment</button>
    <a href="{{ route('admin.payments') }}" class="btn btn-secondary">Cancel</a>
</form>

<script>
document.getElementById('dues_categories_id').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const period = selectedOption.getAttribute('data-period');
    const nominal = selectedOption.getAttribute('data-nominal');

    document.getElementById('period').value = period || '';
    document.getElementById('nominal').value = nominal || '';
});
</script>
@endsection
