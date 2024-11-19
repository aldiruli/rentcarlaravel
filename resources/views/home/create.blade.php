<!-- resources/views/content/create.blade.php -->
@extends('admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Home Content</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('home.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Home Content</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
