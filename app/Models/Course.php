<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = "courses";

    protected $primaryKey = "course_id";

    protected $fillable = [
        'course_id',
        'neptun_id',
        'unique_name',
        'full_name',
        'type',
        'school',
        'hour',
        'prefill',
        'default_headcount',
        'department',
    ];


    public $timestamps = false;


}
