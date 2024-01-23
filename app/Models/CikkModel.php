<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CikkModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'cikkszam';

    protected $fillable = [
        'marka',
        'kategoria',
        'megnevM',
        'megnevA',
        'eladasAr',
        'opcio_id'
    ];
}
