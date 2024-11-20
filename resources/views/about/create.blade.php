@extends('admin')

@section('content')
<div class="container">
    <h1>Add About Content</h1>
    <form action="{{ route('about.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
