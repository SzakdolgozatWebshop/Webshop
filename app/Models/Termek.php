<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termek extends Model
{
    use HasFactory;

    protected $primaryKey = 'ter_id';

    protected $fillable = [
        'elnevezes',
        'Alkategoria',
        'marka',
        'keszlet',
        'eladasi_ar'
    ];
}
