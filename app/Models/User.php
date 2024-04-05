<?php
//declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    public $fillable = [
        'logo_path' ,
        'name' ,
        'email' ,
        'password' ,
        'phone' ,
        'site_url' ,
        'description'
    ];

    protected $table = 'users';
}
