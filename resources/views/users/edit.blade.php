@extends('admin')

@section('content')
<div>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
        </div>
        <div>
            <label for="role_id">Role</label>
            <select name="role_id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</div>

@endsection
