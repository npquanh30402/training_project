@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="row">
        @foreach ($viewData['users'] as $user)
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="{{ asset('/storage/img/users/' . $user->getImage()) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text user-name-text">{{ $user->getName() }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
