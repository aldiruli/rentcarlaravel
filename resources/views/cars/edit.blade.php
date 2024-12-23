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
                <option value="CityCar" {{ $car->category == 'CityCar' ? 'selected' : '' }}>City Car</option>
                <option value="Apv/Mpv" {{ $car->category == 'Apv/Mpv' ? 'selected' : '' }}>Apv/Mpv</option>
                <option value="Minibus" {{ $car->category == 'Minibus' ? 'selected' : '' }}>Minibus</option>
                <option value="Sedan" {{ $car->category == 'Sedan' ? 'selected' : '' }}>Sedan</option>
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
            <select class="form-control" id="status" name="status" onchange="toggleDateFields()">
                <option value="available" {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>Available</option>
                <option value="rented" {{ old('status', $car->status) == 'rented' ? 'selected' : '' }}>Rented</option>
            </select>
        </div>
        <div class="form-group" id="borrowed_at_group" style="display: none;">
            <label for="borrowed_at">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="borrowed_at" name="borrowed_at" 
            value="{{ old('borrowed_at', $car->borrowed_at) }}">
        </div>
        <div class="form-group" id="returned_at_group" style="display: none;">
            <label for="returned_at">Tanggal Kembali</label>
            <input type="date" class="form-control" id="returned_at" name="returned_at" 
            value="{{ old('returned_at', $car->returned_at) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

<script>
    function toggleDateFields() {
        const status = document.getElementById('status').value;
        const borrowedAtGroup = document.getElementById('borrowed_at_group');
        const returnedAtGroup = document.getElementById('returned_at_group');
        
        if (status === 'rented') {
            borrowedAtGroup.style.display = 'block';
            returnedAtGroup.style.display = 'block';
        } else {
            borrowedAtGroup.style.display = 'none';
            returnedAtGroup.style.display = 'none';
            document.getElementById('borrowed_at').value = '';
            document.getElementById('returned_at').value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        toggleDateFields();
    });
</script>
