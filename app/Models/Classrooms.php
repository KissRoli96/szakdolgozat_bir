<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Classrooms extends Model
{
    protected $table = "classrooms";

    protected $primaryKey = "classroom_id";

    protected $fillable = [
        'classroom_id',
        'neptun_id',
        'unique_name',
        'full_name',
        'type',
        'capacity',
        'active',
    ];


}
