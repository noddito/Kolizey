<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    function getPage()
    {
        return view('projects');
    }
}
