<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendeles extends Model
{
    use HasFactory;

    protected $primaryKey = 'rend_szam';

    protected $fillable = [
        'kelt',
        'vasarlo',
        'csomag'
    ];
}
