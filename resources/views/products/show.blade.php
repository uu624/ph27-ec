@extends('layouts.base')

@section('content')
    <h1>{{ $product->name }}</h1>

    <p>{{ $product->price }} 円</p>
@endsection
