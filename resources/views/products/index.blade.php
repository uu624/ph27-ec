@extends('layouts.base')

@section('content')
    <h1>商品一覧</h1>

    <ul>
        @foreach ($products as $product)
            <li>
                <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                {{ $product->price }} 円
            </li>
        @endforeach
    </ul>
@endsection
