<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Danh sách Users - Project Thực Tập';
        $viewData['subtitle'] = 'Danh sách users';
        $viewData['users'] = User::all();

        return view('user.index')->with('viewData', $viewData);
    }
}
