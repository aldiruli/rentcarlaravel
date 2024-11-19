@extends('admin')

@section('title', 'Home')

@section('content')
<div class="container mt-4">
    <h1>Home Content</h1>
    {{-- <div class="mb-3">
        <a href="{{ route('home.create') }}" class="btn btn-primary">Add New Content</a>
    </div> --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th> <!-- Kolom untuk tombol -->
            </tr>
        </thead>
        <tbody>
            @forelse ($homes as $home)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $home->title }}</td>
                    <td>{{ $home->body }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('home.edit', $home->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <!-- Tombol Delete -->
                        <form action="{{ route('home.destroy', $home->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No data available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
