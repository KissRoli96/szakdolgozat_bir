<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalClaim extends Model
{
    protected $table = "personal_claim";

    protected $primaryKey = "id";

    protected  $fillable = [
        'id',
        'user',
        'day',
        'day_comment',
        'max_lesson_con',
        'max_lesson_day',
        'friday',
        'saturday',
        'corr_comment',
        'max_lessons',
        'lessons_comment',
    ];


    public $timestamps = false;
}
