@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header">
            Giở hàng
        </div>
        <div class="card-body" style="overflow: auto">
            @if ($viewData['products'] != null)
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Kích cỡ</th>
                            <th scope="col">Màu sắc</th>
                            <th scope="col">Giá cả</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <th scope="row">{{ $product->getId() }}</th>
                            <td>
                                <a
                                    href="{{ route('product.show', ['id' => $product->getId()]) }}">{{ $product->getName() }}</a>
                            </td>
                            <td>{{ session('products')[$product->getId()]['size'] }}</td>
                            <td>{{ session('products')[$product->getId()]['color'] }}</td>
                            <td>{{ $product->getPrice() }}</td>
                            <td>{{ session('products')[$product->getId()]['quantity'] }}</td>
                            <td>
                                <a href="{{ route('cart.delete', ['id' => $product->getId()]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <p>Không có sản phẩm trong giỏ hàng</p>
            @endif
        </div>
    </div>
@endsection
