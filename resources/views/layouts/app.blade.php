<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Project Thực Tập')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">npquanh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">Danh sách mặt hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-basket"></i> Giỏ hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">Danh sách Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.about') }}">Về chúng tôi</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">Đăng ký</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('admin.home.index') }}">
                                Xin chào, {{ Auth::user()->getName() }}</a>
                            <img class="img-profile rounded-circle"
                                src="{{ asset('/storage/img/users/' . Auth::user()->getImage()) }}"> |
                            </a>
                        </li>
                        <li class="nav-item">
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link">Đăng xuất</button>
                            </form>
                        </li>

                    @endguest
                </ul>
                <form class="d-flex" role="search" action="{{ route('product.search') }}" method="POST">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search_string">
                    <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </nav>

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
