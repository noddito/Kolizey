<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    function getIndexPage()
    {
        return view('customers');
    }
}
