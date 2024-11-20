<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            {{-- <a href="/" class="nav-link">Home</a> --}}
        </li>
    </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <i class="fas fa-user-circle" style="font-size: 1.5em;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- Profile Link -->
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user-edit mr-2"></i> Lihat Profil
                </a>
                <div class="dropdown-divider"></div>
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>    
</nav>
