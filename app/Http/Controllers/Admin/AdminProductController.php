<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Quản lý sản phẩm";
        $viewData['products'] = Product::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function create()
    {
        $viewData = [];
        $viewData['title'] = "Thêm sản phẩm";

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setSize($request->input('size'));
        $newProduct->setColor($request->input('color'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setBrand($request->input('brand'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage("none.png");
        $newProduct->save();

        if ($request->hasFile('image')) {
            $image_name = $newProduct->getId() . '.' . $request->file('image')->extension();

            Storage::disk('public')->put(
                '/img/products/' . $image_name,
                file_get_contents($request->file('image')->getRealPath())
            );
        }
        $newProduct->setImage($image_name);
        $newProduct->save();

        return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
        Product::destroy($id);

        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = "Sửa sản phẩm";
        $viewData['product'] = Product::findOrFail($id);

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Product::validate($request);

        $newProduct = Product::findOrFail($id);

        $newProduct->setName($request->input('name'));
        $newProduct->setSize($request->input('size'));
        $newProduct->setColor($request->input('color'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setBrand($request->input('brand'));
        $newProduct->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $image_name = $newProduct->getId() . '.' . $request->file('image')->extension();

            Storage::disk('public')->put(
                '/img/products/' . $image_name,
                file_get_contents($request->file('image')->getRealPath())
            );


            $newProduct->setImage($image_name);
        }

        $newProduct->save();

        return redirect()->route('admin.product.index');
    }
}
