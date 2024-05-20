<?php
declare(strict_types=1);

namespace App\Models;

use App\Http\Controllers\AdminSide\Traits\ImageSaver;
use App\Http\Controllers\AdminSide\Traits\ProjectsInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use ImageSaver;
    use ProjectsInfo;
    use HasFactory;

    public array $rules = [
        'name' => 'required|string',
        'description' => 'nullable|string',
        'file' => 'nullable|image',
        'status' => 'required|string',
        'customer_id' => 'required|integer',
        'end_date' => 'nullable|date',
    ];

    protected $table = 'projects';
}
