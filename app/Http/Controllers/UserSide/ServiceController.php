<?php
declare(strict_types=1);

namespace App\Http\Controllers\UserSide;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    function index(): View
    {
        return view('user.services');
    }
}
