<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendeles2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'rend_id',
        'cikkszam',
        'menny',
        'allapot'
    ];
}
