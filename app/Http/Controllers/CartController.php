<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ], [
            'quantity' => '正しい個数を入れてください',
        ]);

        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        // session に保存されている cart を取得
        // ない場合は [] （空の配列）になる
        $cart = $request->session()->get('cart', []);

        // 商品IDが key で、何個というのをセッションに保存
        //  ['1' => 5, '2' => 3]
        $cart[$productId] = $quantity;
        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cart = session('cart', []);

        $items = [];
        $totalPrice = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            $totalPrice += $product->price * $quantity;
            $item = [
                'product' => $product,
                'quantity' => $quantity,
            ];
            $items[] = $item;
        }

        return view('cart', [
            'items' => $items,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function destroy()
    {
        // session を削除
        session()->forget('cart');

        return redirect()->route('cart.index');
    }
}
