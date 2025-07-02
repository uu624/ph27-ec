@extends('layouts.base')

@section('content')
    <h2>カート</h2>
    @if (empty($items))
        <p>カートは空です。</p>
    @else
        <ul>
            @foreach ($items as $item)
                <li>
                    {{ $item['product']->name }} - {{ $item['product']->price }}円 - {{ $item['quantity'] }}個
                </li>
            @endforeach
        </ul>
        <p>合計金額: {{ $totalPrice }}円</p>
    @endif
    <form action="{{ route('cart.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="カートを空にする">
    </form>
    <br>
    <a href="{{ route('products.index') }}">商品一覧に戻る</a>
@endsection
