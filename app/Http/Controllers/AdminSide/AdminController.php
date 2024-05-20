<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    function index(): View
    {
        $projects = Project::orderBy('created_at', 'desc')->get();

        return view('admin.index', [
            'projects' => $projects,
            'projects_status_info' => Project::getStatusInfo(),
            'orders_by_last_month' => Project::getOrdersByMonth()
        ]);
    }
}
