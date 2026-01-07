<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Metode SAW</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #0d6efd;
            --sidebar-bg: #212529;
            --sidebar-text: #e9ecef;
            --body-bg: #f5f7f9;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            padding-top: 1rem;
            z-index: 1000;
            transition: all 0.3s;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }

        .sidebar-brand:hover {
            color: #fff;
        }

        .nav-item {
            padding: 0 0.75rem;
            margin-bottom: 0.25rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.75);
            border-radius: 0.375rem;
            transition: all 0.2s;
            font-weight: 500;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        .nav-divider {
            margin: 1rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            transition: all 0.3s;
        }

        /* Navbar (Top) */
        .top-navbar {
            background-color: #fff;
            padding: 0.75rem 2rem;
            margin-left: var(--sidebar-width);
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Card Customization */
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, .125);
            padding: 1rem 1.25rem;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content,
            .top-navbar {
                margin-left: 0;
            }

            .sidebar.show {
                transform: translateX(0);
            }
        }

        /* Utility */
        .text-small {
            font-size: 0.875rem;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <a href="#" class="sidebar-brand">
            <i class="bi bi-grid-1x2-fill"></i>
            SPK SAW
        </a>

        <div class="nav flex-column">
            <div class="nav-item">
                <a href="/kriteria" class="nav-link {{ request()->is('kriteria*') ? 'active' : '' }}">
                    <i class="bi bi-list-task"></i>
                    Kriteria
                </a>
            </div>

            <div class="nav-item">
                <a href="/nilai" class="nav-link {{ request()->is('nilai*') ? 'active' : '' }}">
                    <i class="bi bi-pencil-square"></i>
                    Penilaian
                </a>
            </div>

            <div class="nav-item">
                <a href="/ranking" class="nav-link {{ request()->is('ranking*') ? 'active' : '' }}">
                    <i class="bi bi-trophy"></i>
                    Perangkingan
                </a>
            </div>

            <div class="nav-divider"></div>

            <div class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent"
                        style="cursor: pointer;">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Top Navbar -->
    <header class="top-navbar">
        <h5 class="m-0 text-dark fw-bold">Dashboard</h5>
        <div class="d-flex align-items-center gap-3">
            <span class="text-secondary text-small">
                {{ Auth::user()->name ?? 'Guest' }}
            </span>
            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                style="width: 35px; height: 35px;">
                <i class="bi bi-person-fill"></i>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>