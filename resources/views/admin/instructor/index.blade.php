@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <a href="#"><button type="button" class="btn btn-primary btn-lg">{{ $viewData['add_title'] }}</button></a>
    <div class="card">
        <div class="card-header">
            {{ $viewData['subtitle'] }}
        </div>
        <div class="card-body table-container">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Ngày thêm</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col" colspan="2">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['users'] as $user)
                        <tr>
                            <th scope="row">{{ $user->getId() }}</th>
                            <td>
                                <a href="#">{{ $user->getName() }}</a>
                            </td>
                            <td>{{ $user->getEmail() }}</td>
                            <td>{{ $user->getPhoneNumber() }}</td>
                            <td>{{ $user->getImage() }}</td>
                            <td>{{ $user->getCreatedAt() }}</td>
                            <td>{{ $user->getUpdatedAt() }}</td>
                            <td>
                                <a href="{{ route('admin.instructor.edit', ['user_type' => 3, 'id' => $user->getId()]) }}">
                                    <button>
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.instructor.delete', ['id' => $user->getId()]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa User này không?')" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
