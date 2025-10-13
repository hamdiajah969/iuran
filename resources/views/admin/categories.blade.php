@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center mb-4">Categories</h1>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Period</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->period }}</td>
                                    <td>{{ $category->nominal }}</td>
                                    <td>{{ $category->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success mt-3">Add New Category</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
