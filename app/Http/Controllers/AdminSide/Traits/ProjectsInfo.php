<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide\Traits;

use DB;

trait ProjectsInfo
{
    public static function getStatusInfo(): array
    {
        $projects_statuses = DB::table('projects')->select('status')->get();
        $status_info_array = [];
        foreach ($projects_statuses as $projects_status) {
            $status_info_array[] = $projects_status->status;
        }

        return array_count_values($status_info_array);
    }

    public static function getOrdersByMonth(): array
    {
        $projects_date = DB::table('projects')->select('created_at')->get();
        $projects_count_by_month = [];

        foreach ($projects_date as $project_date) { //Приведение строк с датами месяца в российский формат даты
            $projects_count_by_month[] = implode('-', array_reverse(explode('-', mb_substr($project_date->created_at, 5, -9))));
        }

        return array_count_values($projects_count_by_month);
    }
}
