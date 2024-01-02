<?php

namespace App\Http\Controllers\Admin\Instructor;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminInstructorController extends Controller
{
    public function index($user_type)
    {
        $viewData = [];
        $viewData['title'] = $user_type == 3 ? "Quản lý Instructor" : "Quản lý User";
        $viewData['users'] = User::all()->where('role_id', $user_type);

        $viewData['add_title'] = $user_type == 3 ? "Thêm Instructor" : "Thêm User";
        $viewData['subtitle'] = $user_type == 3 ? "Danh sách Instructor" : "Danh sách User";

        return view('admin.instructor.index')->with('viewData', $viewData);
    }

    public function delete($id)
    {
        User::destroy($id);

        return back();
    }

    public function edit($id, $user_type)
    {
        $viewData = [];
        $viewData['title'] = $user_type == 3 ? "Quản lý Instructor" : "Quản lý User";
        $viewData['user'] = User::findOrFail($id);
        $viewData['edit_title'] = $user_type == 3 ? "Sửa Instructor" : "Sửa User";

        $roles = Role::pluck('role_name', 'id')->toArray();

        $viewData['roles'] = $roles;

        return view('admin.instructor.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        User::validate($request);

        $newUser = User::findOrFail($id);

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

        return redirect()->route('admin.instructor.index');
    }
}
