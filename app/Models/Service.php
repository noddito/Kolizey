<?php
declare(strict_types=1);

namespace App\Models;

use App\Http\Controllers\AdminSide\Traits\ImageSaver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use ImageSaver;

    protected $table = 'services';

    public $fillable = ['logo_path', 'name', 'description'];
}
