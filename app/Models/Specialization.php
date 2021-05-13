<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = "specialization";

    protected $primaryKey = "id_specialization";

    protected $fillable = [
      'id_specialization',
      'id_specialist',
      'name',
      'tag',
    ];
}
