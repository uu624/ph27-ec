<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $saleProducts = Product::where('price', '<', 100)->get();

        return view('products.index', [
            'products' => $products,
            'saleProducts' => $saleProducts,
        ]);
    }

    public function show(int $id)
    {
        // ID が一致するデータを取得する
        // 存在しないIDが指定されたら404になる
        $product = Product::findOrFail($id);

        return view('products.show', [
            'product' => $product,
        ]);
    }
}
