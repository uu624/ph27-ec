@extends('layouts.base')

@section('content')
    <h1>注文完了</h1>
    <div>
        {{ session('message') }}
    </div>
    <div>
        注文番号: {{ $order->id }}
    </div>
    <div>
        <a href="{{ route('products.index') }}">商品一覧に戻る</a>
    </div>
@endsection
