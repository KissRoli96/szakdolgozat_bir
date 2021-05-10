<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demonstrator extends Model
{
    protected $table = "demonstrator";

    protected $primaryKey = "id";

    protected $fillable = [
            'id',
            'user',
            'specs',
            'specialization',
            'semester',
            'min',
            'max',
            'corr',
            'comment',
            'courses',
            'grades',
            'file',
            'next_semester',
            'status',
    ];


    public $timestamps = false;

}
