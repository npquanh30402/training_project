@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <a href="https://www.yandy.com/" class="text-decoration-none">
        <button type="button" class="btn btn-info" style="display: block; margin-left: auto;">Tới trang nguồn sản
            phẩm</button>
    </a>
    <div class="card">
        <div class="card-header">
            Thêm sản phẩm
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

        <form class="add-product" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">ID:</label>
                <input type="number" class="form-control" placeholder="ID sẽ được tạo tự động" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" value="{{ old('name') }}" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Kích thước sản phẩm:</label>
                <input type="text" value="{{ old('size') }}" class="form-control" name="size"
                    placeholder="Ghi theo dạng: S/M/L/X nếu có nhiều hơn 1 kích thước">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Màu sắc sản phẩm:</label>
                <input type="text" value="{{ old('color') }}" class="form-control" name="color"
                    placeholder="Ghi theo dạng: Dark/Red nếu có nhiều hơn 1 màu sắc">
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Hãng:</label>
                <input type="text" value="{{ old('brand') }}" class="form-control" name="brand">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá:</label>
                <input type="text" value="{{ old('price') }}" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <textarea class="form-control" value="{{ old('description') }}" name="description" placeholder="Mô tả sản phẩm"
                        id="floatingTextarea2" style="height: 200px"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh:</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        </form>
    </div>
@endsection
