<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function getIndexPage()
    {
        return view('services');
    }

    function createService()
    {
        $data= Service::all();
        dump($data);
    }


}
