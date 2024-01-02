@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card">
        <div class="card-header">
            Đăng ký
        </div>
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">ID:</label>
                <input type="number" class="form-control" placeholder="ID sẽ được tạo tự động" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên:</label>
                <input type="text" value="{{ old('name') }}" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email:</label>
                <input type="email" value="{{ old('email') }}" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Password:</label>
                <input type="password" value="{{ old('password') }}" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Xác nhận Password:</label>
                <input type="password" value="{{ old('password_confirmation') }}" class="form-control"
                    name="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Số điện thoại:</label>
                <input type="text" value="{{ old('phone_number') }}" class="form-control" name="phone_number">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh:</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="role_id" class="form-label">Vai trò:</label>
                <select class="form-select" name="role_id" style="width: 60%; margin: auto;">
                    @foreach ($viewData['roles'] as $role)
                        <option>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
@endsection
