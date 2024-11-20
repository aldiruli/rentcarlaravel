@extends('admin')

@section('title', 'About')

@section('content')
<div class="container mt-4">
    <h1>About Us Content</h1>
    @if ($abouts->count() < 1)
        <div class="mb-3">
            <a href="{{ route('about.create') }}" class="btn btn-primary">Add ABout Content</a>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Desctiption</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($abouts as $about)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $about->description }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('about.edit', $about->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <!-- Tombol Delete -->
                        <form action="{{ route('about.destroy', $about->id) }}" method="POST" style="display:inline-block;">
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
