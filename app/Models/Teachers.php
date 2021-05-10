<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = "teachers";

    protected $primaryKey = "teacher_id";

    protected $fillable = [
                'teacher_id',
                'user_mail',
                'department',
                'active',
    ];

}
