@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="row">
        @foreach ($viewData['products'] as $pro)
            <div class="col-md-4">
                <div class="card mb-3">
                    <a href="{{ route('product.show', ['id' => $pro->getId()]) }}">
                        <img src="{{ asset('/storage/img/products/' . $pro->getImage()) }}" class="card-img-top"
                            alt="...">
                    </a>
                    <div class="card-body">
                        <p class="card-text">{{ $pro->getName() }}</p>
                        <p>{{ $pro->getPrice() }}</p>
                        <p>
                        <form action="{{ route('cart.add', ['id' => $pro->getId()]) }}" method="POST">
                            @csrf
                            <input type="number" value="1" name="quantity" hidden>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-bag-fill"></i></button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
