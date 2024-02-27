<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosar2 extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'kosar_id',
        'Termek'
    ];

    protected $fillable = 'menny';
}
