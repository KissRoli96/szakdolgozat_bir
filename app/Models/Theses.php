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

    const STATUS_PENDING = 0;
    const STATUS_ACCEPTED = 1;
    const STATUS_DENIED = 2;
    const STATUS_ARCHIVED = 3;

    public static function getStatusList()
    {
        return [
            self::STATUS_PENDING => 'Döntés folyamatban',
            self::STATUS_ACCEPTED => 'Elfogadott',
            self::STATUS_DENIED => 'Elutasított',
            self::STATUS_ARCHIVED => 'Arhív',
        ];
    }


    public function getStatusName()
    {
        return self::getStatusList()[$this->status];
    }
}
