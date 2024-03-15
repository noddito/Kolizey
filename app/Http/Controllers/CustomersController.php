<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    function getPage()
    {
        return view('customers');
    }
}
