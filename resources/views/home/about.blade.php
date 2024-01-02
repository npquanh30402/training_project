@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container">
    <div class="col">
        <div class="col-lg-4 mx-auto">
            <img src="{{ $viewData['image'] }}" class="img-thumbnail">
            <p class="lead">{{ $viewData['author'] }}</p>
            <p class="lead">{{ $viewData['description'] }}</p>
        </div>
    </div>
</div>
@endsection