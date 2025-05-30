<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar text-white py-4">
                <div class="text-center mb-4"><h4>Admin</h4></div>
                <ul class="nav flex-column px-3">
                <a class="nav-link text-white" href="{{ route('dashboard.users') }}">Users</a>
                <a class="nav-link text-white" href="{{ route('dashboard.products.index') }}">Products</a>
                <a class="nav-link text-white" href="{{ route('dashboard.orders') }}">Order</a>
                <a class="nav-link text-white" href="{{ route('dashboard.carts') }}">Cart</a>
                </ul>
            </nav>

          
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>