<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function redirect_main()
    {
        return view('index/index');
    }

    public function redirect_epis()
    {
        return view('index/epis_main');
    }
}