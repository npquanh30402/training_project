<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Project Thực Tập')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
    <style>
        .img-profile {
            height: 2rem;
            width: 2rem;
        }

        .profile-font {
            color: #858796 !important;
            font-size: 80%;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
        aria-controls="staticBackdrop">
        Mở menu
    </button>

    <nav class="p-3 shadow text-end">
        <span class="profile-font">Xin chào, {{ Auth::user()->getName() }}</span>
        <img class="img-profile rounded-circle" src="{{ asset('/storage/img/users/' . Auth::user()->getImage()) }}">
    </nav>

    <div class="admin-nav offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Dashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li><a href="{{ route('admin.home.index') }}" class="nav-link">Admin - Home</a></li>
                <li><a href="{{ route('admin.product.index') }}" class="nav-link">Quản lý sản phẩm</a></li>
                @if (Auth::user()->role->getRoleName() != 'INSTRUCTOR')
                    <li><a href="{{ route('admin.instructor.index', ['user_type' => 3]) }}" class="nav-link">Quản lý
                            Instructor</a></li>
                @endif
                <li><a href="{{ route('admin.instructor.index', ['user_type' => 2]) }}" class="nav-link">Quản lý
                        User</a></li>
                <li><a href="{{ route('home.index') }}" class="nav-link">Quay lại trang chủ</a></li>
            </ul>
        </div>
    </div>

    <div class="card text-center">
        <div class="card-header">
            <h2>@yield('subtitle', 'Project Thực Tập')<h2>
        </div>
        <div class="card-body">
            @yield('content')
        </div>
        <div class="card-footer text-body-secondary text-end">
            Copyright - npquanh
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
