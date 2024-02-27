<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tulajdonsag extends Model
{
    use HasFactory;

    protected $primaryKey = 'tul_id';

    protected $fillable = [
        'elnevezes',
        'mertekegyseg',
        'Fokategoria'
    ];
}
