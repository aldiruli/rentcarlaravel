@extends('admin')

@section('title', 'Add New Car')

@section('content')
<div class="container mt-4">
    <h1>Add New Car</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="">-- Select Category --</option>
                <option value="SUV">SUV</option>
                <option value="Minibus">Minibus</option>
            </select>
        </div>               
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="available">Available</option>
                <option value="rented">Rented</option>
            </select>
        </div>
        <div class="form-group">
            <label for="borrowed_at">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="borrowed_at" name="borrowed_at">
        </div>
        <div class="form-group">
            <label for="returned_at">Tanggal Kembali</label>
            <input type="date" class="form-control" id="returned_at" name="returned_at">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
