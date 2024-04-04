<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

class AdminController extends Controller
{
    function getIndexPage ()
    {
        $projects = Project::orderBy('created_at' , 'desc')->get();
        return view('admin.index' , [
            'projects' => $projects
        ]);
    }

}
