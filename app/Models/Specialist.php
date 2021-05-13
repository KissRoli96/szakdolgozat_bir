<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{

    protected $table = "specialist";

    protected $primaryKey = "id_specialist";

    protected $fillable = [
      'id_specialist',
      'name',
      'tag',
      'code',
    ];

}
