@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["product"]["name"] }}
                </h5>
                <p class="card-text">{{ $viewData["product"]["description"] }}</p>
                @if ( (int)$viewData["product"]["price"] <= 100)
                    <strong class="card-text">$ {{ $viewData["product"]["price"] }}</strong>
                @else
                    <strong class="card-text" style="color: red;">$ {{ $viewData["product"]["price"] }}</strong>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
