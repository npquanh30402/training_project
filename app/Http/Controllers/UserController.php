<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $viewData = [];
        $viewData['title'] = "Đăng ký";

        $roles = Role::pluck('role_name', 'id')->toArray();

        $viewData['roles'] = $roles;

        return view('user.register')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        User::validate($request);

        /*$data = $request->only('name', 'email', 'password', 'phone_number');

        if ($request->hasFile('image')) {
            $user = User::create($data);
            $image_name = $user->getId() . '.' . $request->file('image')->extension();

            Storage::disk('public')->put(
                '/img/users/' . $image_name,
                file_get_contents($request->file('image')->getRealPath())
            );

            $data['image'] = $image_name;
        } else {
            User::create($data);
        }*/

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

        return redirect()->route('home.index');
    }

    public function login()
    {
        $viewData = [];
        $viewData['title'] = "Đăng nhập";

        return view('user.login')->with('viewData', $viewData);
    }

    public function login_confirm(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->getPassword())) {
            //$request->session()->put('user', $user);

            //setcookie("user_login_status", true, time() + (86400 * 30), "/");
            //setcookie("user_login_name", $user->getName(), time() + (86400 * 30), "/");

            return redirect()->route('home.index');
        }

        return back();
    }
}
