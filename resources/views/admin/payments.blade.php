@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center mb-4">Payments</h1>
            <div class="card">
                <div class="card-body">
                    <form id="bulk-delete-form" action="{{ route('admin.payments.bulkDelete') }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <div class="d-flex justify-content-between mb-3">
                            <button type="submit" id="bulk-delete-btn" class="btn btn-danger" style="display:none;" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran yang dipilih?');">Hapus Terpilih</button>
                            <a href="{{ route('admin.payments.create') }}" class="btn btn-success">Bayar</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all"></th>
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
                                        <td><input type="checkbox" name="payment_ids[]" value="{{ $payment->id }}" class="payment-checkbox"></td>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $payment->user->name ?? 'N/A' }}</td>
                                        <td>{{ $payment->nominal }}</td>
                                        <td>{{ $payment->period }}</td>
                                        <td>{{ $payment->petugas }}</td>
                                        <td>{{ $payment->jumlah_tagihan }}</td>
                                        <td>{{ $payment->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.payments.detail', $payment->id) }}" class="btn btn-sm btn-info">Detail</a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('select-all');
    const paymentCheckboxes = document.querySelectorAll('.payment-checkbox');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');

    selectAllCheckbox.addEventListener('change', function() {
        paymentCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        toggleBulkDeleteBtn();
    });

    paymentCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedBoxes = document.querySelectorAll('.payment-checkbox:checked');
            selectAllCheckbox.checked = checkedBoxes.length === paymentCheckboxes.length;
            toggleBulkDeleteBtn();
        });
    });

    function toggleBulkDeleteBtn() {
        const checkedBoxes = document.querySelectorAll('.payment-checkbox:checked');
        bulkDeleteBtn.style.display = checkedBoxes.length > 0 ? 'inline-block' : 'none';
    }
});
</script>
@endsection
