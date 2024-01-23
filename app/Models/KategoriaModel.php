<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriaModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'kategoria_id';

    protected $fillable = [
        'megnevM',
        'megnevA'
    ];
}
