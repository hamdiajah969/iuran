@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center mb-4">Members</h1>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Period</th>
                                    <th>Registration Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->user->name ?? 'N/A' }}</td>
                                    <td>{{ $member->duesCategory->period ?? 'N/A' }}</td>
                                    <td>{{ $member->registration_date }}</td>
                                    <td>
                                        <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.members.delete', $member->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('admin.members.create') }}" class="btn btn-success mt-3">Tambah Member Baru</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
