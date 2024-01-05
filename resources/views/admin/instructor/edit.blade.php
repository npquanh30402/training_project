@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $viewData['edit_title'] }} - {{ $viewData['user']->getName() }}
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

        <div class="row">
            <img class="img-pro" src="{{ asset('/storage/img/users/' . $viewData['user']->getImage()) }}" alt="...">

            <form class="add-product" action="{{ route('admin.instructor.update', ['id' => $viewData['user']->getId()]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">ID:</label>
                    <input type="number" class="form-control" value="{{ $viewData['user']->getId() }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên:</label>
                    <input type="text" value="{{ $viewData['user']->getName() }}" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" value="{{ $viewData['user']->getEmail() }}" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Số điện thoại:</label>
                    <input type="text" value="{{ $viewData['user']->getPhoneNumber() }}" class="form-control"
                        name="phone_number">
                </div>
                <div class="mb-3">
                    <label for="role_id" class="form-label">Vai trò:</label>
                    <select class="form-select" name="role_id" style="width: 60%; margin: auto;">
                        @foreach ($viewData['roles'] as $roleId => $roleName)
                            <option value="{{ $roleId }}" @if ($roleId == $viewData['user']->getRoleId()) selected @endif>
                                {{ $roleName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Avatar:</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <input type="hidden" class="form-control" name="user_type" value="{{ $viewData['user']->getRoleId() }}">
                <button type="submit" class="btn btn-primary">Sửa user</button>
            </form>
        </div>
    </div>
@endsection
