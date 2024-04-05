<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index ()
    {
        $projects = Project::orderBy('created_at' , 'desc')->get();
        return view('admin.index' , [
            'projects' => $projects,
            'projects_status_info' => $this->getStatusInfo() ,
            'orders_by_last_month' => $this->getOrdersByMonth()
        ]);
    }

    protected function getStatusInfo() : array
    {
        $projects_statuses = DB::table('projects')->select('status')->get();
        $status_info_array = [];
        foreach ($projects_statuses as $projects_status){
            $status_info_array[] = $projects_status->status;
        }

        return array_count_values($status_info_array);
    }

    protected function getOrdersByMonth() : array
    {
        $projects_date = DB::table('projects')->select('created_at')->get();
        $projects_count_by_month = [];

        foreach ($projects_date as $project_date){ //Приведение строк с датами месяца в российский формат даты
            $projects_count_by_month[] = implode('-', array_reverse(explode('-', mb_substr($project_date->created_at , 5 , -9))));
        }

        return array_count_values($projects_count_by_month);
    }
}
