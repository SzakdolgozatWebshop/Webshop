<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termek_jellemzo extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'Termek',
        'Tulajdonsag'
    ];

    protected $fillable = 'ertek';

}
