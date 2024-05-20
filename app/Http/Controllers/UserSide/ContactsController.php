<?php
declare(strict_types=1);

namespace App\Http\Controllers\UserSide;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ContactsController extends Controller
{
    function index(): View
    {
        return view('user.contacts');
    }
}
