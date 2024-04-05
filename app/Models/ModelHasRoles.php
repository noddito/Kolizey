<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ModelHasRoles extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'role_id , model_type , model_id';
    protected $table = 'model_has_roles';
    public $fillable = ['role_id , model_type, model_id'];
}
