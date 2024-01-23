<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosar2 extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'kosar_id',
        'cikkszam',
        'menny',
        'utolsoBe'
    ];

}
