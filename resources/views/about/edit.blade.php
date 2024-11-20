@extends('admin')

@section('content')
<div class="container">
    <h1>Edit About Content</h1>
    <form action="{{ route('about.update', $about->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $about->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
