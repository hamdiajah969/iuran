<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar {
            height: 100vh;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            padding: 1.5rem;
        }
        .sidebar .nav-link {
            color: white;
            transition: 0.2s;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
        }

        /* Main content */
        .main-content {
            margin-left: 250px;
            padding: 40px 60px;nan */
            min-height: 100vh;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: start;
        }

        .content-wrapper {
            width: 100%;
            max-width: 1000px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <h4 class="mb-4">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.members') }}">Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.payments') }}">Payments</a>
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
