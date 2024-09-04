<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipaments extends Model
{
    use HasFactory;

    protected $table = 'equipaments';

    protected $fillable = [
        'id',
        'project_id',
        'equipament',
        'quantity',
    ];
}
