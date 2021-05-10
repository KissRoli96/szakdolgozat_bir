<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseDivision2019Tavasz extends Model
{
    protected $table = "course_division_2019_tavasz";

    protected $primaryKey = "cd_id";

    protected $fillable = [
        'cd_id',
        'unique_name',
        'practice_id',
        'whose',
        'headcount',
        'teacher',
        'teacher_percentage',
        'confirm',
        'exam',
        'comment',
        'deleted',
        'forced',
        'open',
        'dephelper',
    ];


    public $timestamps = false;

}
