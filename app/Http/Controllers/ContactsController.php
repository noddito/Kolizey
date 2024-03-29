<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    function getIndexPage()
    {
        return view('contacts');
    }
}
