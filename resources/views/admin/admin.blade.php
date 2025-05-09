<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4e73df;
            --primary-dark: #2e59d9;
            --primary-light: #7a9ff1;
            --secondary: #2c3e50;
            --light-bg: #f8f9fc;
            --light-gray: #f1f3f9;
            --border-color: #e3e6f0;
            --text-muted: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --dark: #5a5c69;
            --white: #ffffff;
        }

        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--light-bg);
            color: var(--dark);
            font-size: 0.9rem;
        }

        /* Sidebar styling */
        .sidebar {
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            min-height: 100vh;
            width: 250px;
            position: fixed;
            z-index: 1000;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            background: rgba(0, 0, 0, 0.1);
            color: white;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .sidebar-header .logo img {
            height: 40px;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.75rem 1.5rem;
            margin: 0.15rem 0;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar .nav-link:hover {
            color: var(--white);
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 3px solid var(--primary-light);
        }

        .sidebar .nav-link.active {
            color: var(--white);
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 3px solid var(--white);
        }

        .sidebar .nav-link i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
            font-size: 0.9rem;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px;
            padding: 0;
            min-height: 100vh;
            width: calc(100% - 250px);
        }

        /* Container fluid */
        .container-fluid {
            padding: 1.5rem;
            width: 100%;
        }

        /* Page header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
            width: 100%;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--secondary);
            margin: 0;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: var(--white);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }

        .card-header h6 {
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Tables */
        .table {
            color: var(--dark);
            margin-bottom: 0;
        }

        .table thead th {
            background-color: var(--light-gray);
            border-bottom: 1px solid var(--border-color);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid var(--border-color);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        /* Forms */
        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--secondary);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }

        /* Buttons */
        .btn {
            font-weight: 600;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-warning {
            background-color: var(--warning);
            border-color: var(--warning);
            color: var(--dark);
        }

        .btn-danger {
            background-color: var(--danger);
            border-color: var(--danger);
        }

        .btn-info {
            background-color: var(--info);
            border-color: var(--info);
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 0.375rem;
            padding: 1rem 1.5rem;
        }

        /* Badges */
        .badge {
            font-weight: 600;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
        }

        .bg-success {
            background-color: var(--success) !important;
        }

        .bg-warning {
            background-color: var(--warning) !important;
            color: var(--dark) !important;
        }

        .bg-danger {
            background-color: var(--danger) !important;
        }

        .bg-info {
            background-color: var(--info) !important;
        }

        /* Avatar */
        .avatar-xs {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            font-size: 0.75rem;
            border-radius: 50%;
        }

        .avatar-sm {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 50%;
        }

        .bg-light-primary {
            background-color: rgba(78, 115, 223, 0.2);
            color: var(--primary);
        }

        /* Rating stars */
        .rating {
            color: var(--warning);
        }

        .rating .text-muted {
            color: var(--text-muted) !important;
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                overflow: hidden;
            }
            .sidebar-header h5, .sidebar .nav-link span {
                display: none;
            }
            .sidebar .nav-link {
                text-align: center;
                padding: 0.75rem;
            }
            .sidebar .nav-link i {
                margin-right: 0;
                font-size: 1rem;
            }
            .main-content {
                margin-left: 80px;
                width: calc(100% - 80px);
            }
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .page-header h1 {
                margin-bottom: 0.5rem;
            }
        }

        @media (max-width: 576px) {
            .container-fluid {
                padding: 1rem;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="{{ asset('images/rentfast-logo.png') }}" alt="RentFast Logo">
                </div>
                <h5>RentFast Admin</h5>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}" href="{{ route('admin.reservations.index') }}">
                        <i class="fas fa-fw fa-calendar-check"></i>
                        <span>Réservations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.clients*') ? 'active' : '' }}" href="{{ route('admin.clients') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.cars*') ? 'active' : '' }}" href="{{ route('admin.cars') }}">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Véhicules</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.avis*') ? 'active' : '' }}" href="{{ route('admin.avis') }}">
                        <i class="fas fa-fw fa-star"></i>
                        <span>Avis</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('offres.*') ? 'active' : '' }}" href="{{ route('offres.index') }}">
                        <i class="fas fa-fw fa-tags"></i>
                        <span>Offres</span>
                    </a>
                </li>
                <li class="nav-item mt-auto mb-4">
   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-auto mb-4">
    @csrf
    <button type="submit" class="nav-link text-white bg-danger bg-opacity-20 rounded-3 px-3 py-2 d-flex align-items-center justify-content-between w-100 border-0 text-start">
        <div class="d-flex align-items-center">
            <i class="fas fa-fw fa-sign-out-alt me-2"></i>
            <span>Déconnexion</span>
        </div>
        <i class="fas fa-chevron-right small"></i>
    </button>
</form>

</li>
            </ul>
        </div>

        {{-- Main Content --}}
        <div class="main-content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
