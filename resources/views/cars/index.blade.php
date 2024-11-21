@extends('admin')

@section('title', 'Car List')

@section('content')
<div class="container mt-4">
    <h1>Car List</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Status</th>
                <th>Borrowed At</th>
                <th>Returned At</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $car->title }}</td>
                    <td>{{ $car->description }}</td>
                    <td>{{ $car->category }}</td>
                    <td>{{ $car->status }}</td>
                    <td>{{ $car->borrowed_at ? \Carbon\Carbon::parse($car->borrowed_at)->format('d-m-Y') : '-' }}</td>
                    <td>{{ $car->returned_at ? \Carbon\Carbon::parse($car->returned_at)->format('d-m-Y') : '-' }}</td>
                    <td>
                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->title }}" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
