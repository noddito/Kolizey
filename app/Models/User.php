<?php
declare(strict_types=1);

namespace App\Models;

use App\Http\Controllers\AdminSide\Traits\ImageSaver;
use App\Http\Controllers\AdminSide\Traits\PasswordVerifier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ImageSaver;
    use HasFactory;
    use HasRoles;
    use PasswordVerifier;

    public $fillable = [
        'logo_path',
        'name',
        'email',
        'password',
        'phone',
        'site_url',
        'description'
    ];

    protected $table = 'users';
}
