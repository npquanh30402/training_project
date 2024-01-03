<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserInstructorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_type)
    {
        $users = User::all()->where('role_id', $user_type);;

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newUser = new User();
        $newUser->setName($request->input('name'));
        $newUser->setEmail($request->input('email'));
        $newUser->setPassword(Hash::make($request->input('password')));
        $newUser->setPhoneNumber($request->input('phone_number'));
        $newUser->setImage("none.png");
        $newUser->setRoleId(2);
        $newUser->save();

        if ($request->hasFile('image')) {
            $image_name = $newUser->getId() . '.' . $request->file('image')->extension();

            Storage::disk('public')->put(
                '/img/users/' . $image_name,
                file_get_contents($request->file('image')->getRealPath())
            );

            $newUser->setImage($image_name);
            $newUser->save();
        }

        return response()->json([
            'message' => 'Đã thêm User thành công!',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*$pro = User::findOrFail($id);
        $pro->update($request->only(['name', 'size', 'color', 'description', 'brand', 'price']));
        return $pro;*/

        $newUser = User::findOrFail($id);

        if (!empty($newUser)) {
            $newUser->setName($request->input('name'));
            $newUser->setEmail($request->input('email'));
            $newUser->setPhoneNumber($request->input('phone_number'));
            $newUser->setRoleId($request->input('role_id'));

            if ($request->hasFile('image')) {
                $image_name = $newUser->getId() . '.' . $request->file('image')->extension();

                Storage::disk('public')->put(
                    '/img/users/' . $image_name,
                    file_get_contents($request->file('image')->getRealPath())
                );


                $newUser->setImage($image_name);
            }

            $newUser->save();

            return response()->json([
                'message' => 'Đã cập nhật User thành công!',
            ]);
        } else {
            return response()->json([
                'message' => "Không tìm thấy User!",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (User::where('id', $id)->exists()) {
            User::findOrFail($id)->delete();

            return response()->json([
                'message' => 'Đã xóa User thành công!',
            ]);
        } else {
            return response()->json([
                'message' => "Không tìm thấy User!",
            ], 404);
        }
    }
}
