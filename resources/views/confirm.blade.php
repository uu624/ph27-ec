@extends('layouts.base')

@section('content')
    <h1>確認画面</h1>
    @foreach ($items as $item)
        <div>
            {{ $item['product']->name }}
            {{ $item['product']->price }} 円
            {{ $item['quantity'] }} 個
        </div>
    @endforeach
    @if ($totalPrice > 0)
        <div>
            合計金額: {{ $totalPrice }}円
        </div>
    @endif
    <div>
        <a href="{{ route('order') }}">注文する</a>
    </div>
@endsection
