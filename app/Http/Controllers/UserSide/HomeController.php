<?php
declare(strict_types=1);

namespace App\Http\Controllers\UserSide;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectPhoto;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $img = ProjectPhoto::orderBy('id' , 'desc')->get();
        return view('user.home' , [
            'images' => $img
        ]);
    }
}
