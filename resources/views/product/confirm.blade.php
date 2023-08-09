@extends('layouts.app')
@section('title', 'Confirmation page')
@section('content')
<div class="text-center">
    Created object: {{$name}}, with price: ${{$price}}
</div>
@endsection
