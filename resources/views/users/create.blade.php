<!-- resources/views/content/create.blade.php -->
@extends('admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create New User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                         <!-- Name -->
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
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
                        <div class="row">
                            {{-- <div class="col-8">
                                <a href="{{ route('login') }}" class="text-center">Already registered?</a>
                            </div> --}}
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
