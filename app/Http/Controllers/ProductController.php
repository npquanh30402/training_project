<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Danh sách sản phẩm - Project Thực Tập';
        $viewData['subtitle'] = 'Danh sách sản phẩm';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function search(Request $request)
    {
        $name = $request->search_string;

        $viewData = [];
        $viewData['title'] = 'Danh sách sản phẩm có tên' . $name;
        $viewData['subtitle'] = 'Danh sách sản phẩm';


        $viewData['products'] = Product::where('name', 'like', '%' . $name . '%')->get();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show($id)
    {
        $viewData = [];

        $product = Product::findOrFail($id);

        if (strpos($product->getColor(), '/') !== false)
            $colors = explode('/', $product->getColor());
        else
            $colors = $product->getColor();

        if (strpos($product->getSize(), '/') !== false)
            $sizes = explode('/', $product->getSize());
        else
            $sizes = $product->getSize();

        $viewData['title'] = 'Sản phẩm ' . $product->getName() . ' - Project Thực Tập';
        $viewData['subtitle'] = 'Thông tin sản phẩm: ' . $product->getName();
        $viewData['product'] = $product;

        $viewData['colors'] = $colors;
        $viewData['sizes'] = $sizes;

        return view('product.show')->with('viewData', $viewData);
    }
}
