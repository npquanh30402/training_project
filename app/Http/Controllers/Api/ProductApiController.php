<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return Product::create($request->only(['name', 'size', 'color', 'description', 'brand', 'price']));

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

        return response()->json([
            'message' => 'Đã thêm sản phẩm thành công!',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        if (!empty($product)) {
            return response()->json($product);
        } else {
            return response()->json([
                'message' => "Không tìm thấy sản phẩm!",
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*$pro = Product::findOrFail($id);
        $pro->update($request->only(['name', 'size', 'color', 'description', 'brand', 'price']));
        return $pro;*/

        $newProduct = Product::findOrFail($id);

        if (!empty($newProduct)) {
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

            return response()->json([
                'message' => 'Đã cập nhật sản phẩm thành công!',
            ]);
        } else {
            return response()->json([
                'message' => "Không tìm thấy sản phẩm!",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Product::where('id', $id)->exists()) {
            Product::findOrFail($id)->delete();

            return response()->json([
                'message' => 'Đã xóa sản phẩm thành công!',
            ]);
        } else {
            return response()->json([
                'message' => "Không tìm thấy sản phẩm!",
            ], 404);
        }
    }
}
