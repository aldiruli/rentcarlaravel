<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tambahkan CSS AdminLTE -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('partials.navbar')

        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <!-- Update Profile Information -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Update Profile Information</h3>
                                </div>
                                <div class="card-body">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>

                            <!-- Update Password -->
                            <div class="card card-warning mt-4">
                                <div class="card-header">
                                    <h3 class="card-title">Update Password</h3>
                                </div>
                                <div class="card-body">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>

                            <!-- Delete User Account -->
                            <div class="card card-danger mt-4">
                                <div class="card-header">
                                    <h3 class="card-title">Delete Account</h3>
                                </div>
                                <div class="card-body">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Tambahkan JS AdminLTE -->
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
</body>
</html>
