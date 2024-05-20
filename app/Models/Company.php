<?php
declare(strict_types=1);
namespace App\Models;

use App\Http\Controllers\AdminSide\Traits\FileSaver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use FileSaver;

    protected $table = 'company';

    public $fillable = ['file_name','file_description','file_path' , 'updated_at' , 'created_at'];

    public array $rules = [
        'file_name' => 'required|string',
        'file_description' => 'nullable|string',
        'file' => 'file',
    ];
}
