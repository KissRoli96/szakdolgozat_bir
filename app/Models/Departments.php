<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{

    protected $table = "departments";


    protected $primaryKey = "department_id";

    protected $fillable = [
        'department_id',
        'unique_id',
        'department',
        'active',
    ];


    public $timestamps = false;

}
