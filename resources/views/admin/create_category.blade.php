@extends('layouts.admin')

@section('content')
<h1>Buat Kategori</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="period" class="form-label">Period</label>
        <select class="form-select" id="period" name="period" required>
            <option value="mingguan" {{ old('period') == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
            <option value="bulanan" {{ old('period') == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
            <option value="tahunan" {{ old('period') == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal') }}" required min="0">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Buat</button>
    <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Batal</a>
</form>

<script>
document.getElementById('period').addEventListener('change', function() {
    var period = this.value;
    var nominalInput = document.getElementById('nominal');
    if (period === 'mingguan') {
        nominalInput.value = 5000;
    } else if (period === 'bulanan') {
        nominalInput.value = 20000;
    } else if (period === 'tahunan') {
        nominalInput.value = 260000;
    }
});
</script>
@endsection
