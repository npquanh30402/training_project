<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Home Page - Project Thực Tập';
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData['title'] = 'About Page - Project Thực Tập';
        $viewData['subtitle'] = 'Về chúng tôi';
        $viewData['description'] = 'Sinh viên trường UNETI';
        $viewData['author'] = 'npquanh';
        $viewData['image'] = asset('/img/avatar.jpg');

        return view('home.about')->with("viewData", $viewData);
    }
}
