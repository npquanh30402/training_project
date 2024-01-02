@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <a href="{{ route('admin.product.create') }}"><button type="button" class="btn btn-primary btn-lg">Thêm sản
            phẩm</button></a>
    <div class="card">
        <div class="card-header">
            Danh sách sản phẩm
        </div>
        <div class="card-body table-container">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Kích cỡ</th>
                        <th scope="col">Màu sắc</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Thương hiệu</th>
                        <th scope="col">Giá cả</th>
                        <th scope="col">Ngày thêm</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col" colspan="2">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <th scope="row">{{ $product->getId() }}</th>
                            <td>
                                <a
                                    href="{{ route('product.show', ['id' => $product->getId()]) }}">{{ $product->getName() }}</a>
                            </td>
                            <td>{{ $product->getSize() }}</td>
                            <td>{{ $product->getColor() }}</td>
                            <td>
                                <textarea>{{ $product->getDescription() }}</textarea>
                            </td>
                            <td>{{ $product->getBrand() }}</td>
                            <td>{{ $product->getPrice() }}</td>
                            <td>{{ $product->getCreatedAt() }}</td>
                            <td>{{ $product->getUpdatedAt() }}</td>
                            <td>
                                <a href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}">
                                    <button>
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.product.delete', ['id' => $product->getId()]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" type="submit">
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
