<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function confirm()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect('/products');
        }

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

        return view('confirm', [
            'items' => $items,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function order(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart) || ! $request->user()) {
            return redirect('/products');
        }

        $products = [];
        $totalPrice = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            $totalPrice += $product->price * $quantity;
            $products[] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        $order = new Order;
        $order->user_id = $request->user()->id;
        $order->total_price = $totalPrice;
        $order->save();

        foreach ($products as $product) {
            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product['product']->id;
            $orderDetail->price = $product['product']->price;
            $orderDetail->quantity = $product['quantity'];
            $orderDetail->save();
        }

        session()->forget('cart');
        session()->flash('message', '注文が完了しました');

        return view('complete', [
            'order' => $order,
        ]);
    }
}
