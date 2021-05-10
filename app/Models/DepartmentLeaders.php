<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentLeaders extends Model
{
    protected $table = "department_leaders";

    protected $primaryKey = "leader_id";

    protected $fillable = [
                'leader_id',
                'department',
                'leader',
                'active',
    ];

}
