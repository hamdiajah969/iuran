<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Warga Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .sidebar {
            height: 100vh;
            background: linear-gradient(135deg, #198754, #20c997);
            color: white;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .sidebar .nav-link {
            color: white;
            transition: 0.2s;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
        }
        .main-content {
            margin-left: 250px;
            padding: 40px 60px;
            min-height: 100vh;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .content-wrapper {
            width: 100%;
            max-width: 1000px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
                padding: 1rem;
            }
            .main-content {
                margin-left: 200px;
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                width: 100%;
                height: auto;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 1rem;
            }
            .sidebar h4 {
                margin: 0;
            }
            .sidebar ul {
                display: none;
            }
            .main-content {
                margin-left: 0;
                padding-top: 80px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <h4 class="mb-4">Warga Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('warga.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('warga.payment_history') }}">Payment History</a>
            </li>
        </ul>
        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
