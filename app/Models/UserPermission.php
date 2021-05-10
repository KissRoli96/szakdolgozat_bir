<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = "user_permission";

    protected $primaryKey = "id_user_permission";

    protected $fillable = [
        'id_user_permission',
        'id_user',
        'permission',
        'valid',
    ];


    public $timestamps = false;
}
