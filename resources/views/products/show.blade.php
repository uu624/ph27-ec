@extends('layouts.base')

@section('content')
    <h2>{{ $product->name }}</h2>
    <div>
        {{ $product->price }}円
    </div>
    <form action="{{ route('cart.store') }}" method="post">
        @csrf
        <input type="number" name="quantity">個<br>
        <input type="submit" value="カートに入れる">
    </form>
@endsection
