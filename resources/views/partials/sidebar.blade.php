<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <span class="brand-text font-weight-light">Rent Car Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="toggleMenu(event, 'submenu-content')">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Content
                            <i class="right fas fa-angle-down"></i>
                        </p>
                    </a>
                    <ul id="submenu-content" class="nav nav-treeview d-none">
                        <li class="nav-item">
                            <a href="{{ route('home.index') }}" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about.index') }}" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>About Us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cars.index') }}" class="nav-link">
                                <i class="fas fa-car nav-icon"></i>
                                <p>Cars</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Drivers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Booking/Orders</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script>
    function toggleMenu(event, menuId) {
        event.preventDefault();
        const submenu = document.getElementById(menuId);
        if (submenu.classList.contains('d-none')) {
            submenu.classList.remove('d-none');
            submenu.classList.add('d-block');
        } else {
            submenu.classList.remove('d-block');
            submenu.classList.add('d-none');
        }
    }
</script>
