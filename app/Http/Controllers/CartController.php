<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $products_in_cart = [];

        $products_in_session = $request->session()->get('products');

        if ($products_in_session) {
            $products_in_cart = [];
            foreach (array_keys($products_in_session) as $productId) {
                $product = Product::find($productId);
                if ($product) {
                    $products_in_cart[$productId] = $product;
                }
            }

            $total = Product::pricesXQuantities($products_in_cart, $products_in_session);
        }

        $viewData = [];
        $viewData["title"] = "Giỏ hàng";
        $viewData["subtitle"] = "Danh sách hàng đã đặt";
        $viewData["total"] = $total;
        $viewData["products"] = $products_in_cart;

        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = session('products');

        if ($request->has('color') && $request->has('size')) {
            $products[$id] = [
                'quantity' => $request->quantity,
                'color' => $request->color,
                'size' => $request->size,
            ];
        } else {
            $the_product = Product::find($id);

            $color_single = null;
            $size_single = null;

            if (strpos($the_product->getColor(), '/') !== false)
                $colors = explode('/', $the_product->getColor());
            else
                $color_single = $the_product->getColor();

            if (strpos($the_product->getSize(), '/') !== false)
                $sizes = explode('/', $the_product->getSize());
            else
                $size_single = $the_product->getSize();

            $products[$id] = [
                'quantity' => $request->quantity,
                'color' => !empty($colors) ? $colors[0] : $color_single,
                'size' => !empty($sizes) ? $sizes[0] : $size_single,
            ];
        }

        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request, $id)
    {
        $products = session('products');

        unset($products[$id]);

        $request->session()->put('products', $products);

        return back();
    }
}
