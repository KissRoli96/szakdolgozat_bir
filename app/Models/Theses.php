<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Theses extends Model
{
    protected $table = 'thesis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user',
        'department',
        'type',
        'day',
        'corr',
        'task_name',
        'task_name_en',
        'headcount',
        'mi',
        'pti',
        'gi',
        'ibi',
        'it',
        'task_description',
        'task_description_en',
        'preschool',
        'knowledge',
        'students',
        'co_teacher',
        'tags',
        'created',
        'status',
        'supervisior',
    ];


    public $timestamps = false;
}
