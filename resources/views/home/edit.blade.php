<!-- resources/views/content/edit.blade.php -->
@extends('admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Home Content</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('home.update', $home) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $home->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" id="body" name="body" rows="5" required>{{ $home->body }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Home Content</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
