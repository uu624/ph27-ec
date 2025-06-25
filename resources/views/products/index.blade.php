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

    <h2 class="sale">特価商品</h2>
    <ul>
        @foreach ($saleProducts as $product)
            <li>
                <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                {{ $product->price }} 円
            </li>
        @endforeach
    </ul>
@endsection
