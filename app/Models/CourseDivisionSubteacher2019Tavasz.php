<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseDivisionSubteacher2019Tavasz extends Model
{
    protected $table = "course_division_subteacher_2019_tavasz";

    protected $primaryKey = "subteacher_id";

    protected $fillable = [
        'subteacher_id',
        'course_id',
        'teacher_id',
        'percentage',
        'active',
    ];


    public $timestamps = false;

}
