@extends('admin')

@section('title', 'Edit Car')

@section('content')
<div class="container mt-4">
    <h1>Edit Car</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $car->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $car->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="">-- Select Category --</option>
                <option value="SUV" {{ $car->category == 'SUV' ? 'selected' : '' }}>SUV</option>
                <option value="Minibus" {{ $car->category == 'Minibus' ? 'selected' : '' }}>Minibus</option>
            </select>
        </div>           
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->title }}" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="available" {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>Available</option>
                <option value="rented" {{ old('status', $car->status) == 'rented' ? 'selected' : '' }}>Rented</option>
            </select>
        </div>
        <div class="form-group">
            <label for="borrowed_at">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="borrowed_at" name="borrowed_at" 
            value="{{ old('borrowed_at', $car->borrowed_at) }}">
        </div>
        <div class="form-group">
            <label for="returned_at">Tanggal Kembali</label>
            <input type="date" class="form-control" id="returned_at" name="returned_at" 
             value="{{ old('returned_at', $car->returned_at) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
