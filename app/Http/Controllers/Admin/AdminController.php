<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function getIndexPage ()
    {
        return view('admin.index');
    }

}
