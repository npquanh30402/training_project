@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3 product-details">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/img/products/' . $viewData['product']->getImage()) }}"
                    class="img-fluid rounded-start" alt="Sản phẩm {{ $viewData['product']->getName() }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <form action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}" method="POST">
                        <h5 class="card-title">{{ $viewData['product']->getName() }}</h5>
                        <span>Màu sắc:</span>
                        @if (is_array($viewData['colors']))
                            <select class="form-select" name="color">
                                @foreach ($viewData['colors'] as $color)
                                    <option>{{ $color }}</option>
                                @endforeach
                            </select>
                        @else
                            <p class="card-text">{{ $viewData['colors'] }}</p>
                        @endif

                        <span>Kích thước:</span>
                        @if (is_array($viewData['sizes']))
                            <select class="form-select" name="size">
                                @foreach ($viewData['sizes'] as $size)
                                    <option>{{ $size }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="hidden" name="size" value="{{ $viewData['sizes'] }}">
                            <p class="card-text" name="size">{{ $viewData['sizes'] }}</p>
                        @endif

                        <span>Hãng:</span>
                        <p class="card-text">{{ $viewData['product']->getBrand() }}</p>

                        <span>Mô tả:</span>
                        <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                        <span>Giá:</span>
                        <p class="card-text">{{ $viewData['product']->getPrice() }}</p>


                        @csrf
                        <span>Số lượng:</span>
                        <input type="number" value="1" name="quantity">
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
