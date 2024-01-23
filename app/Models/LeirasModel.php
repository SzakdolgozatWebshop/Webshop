<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeirasModel extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'id'
    ];

    protected $fillable = [
        'cikkszam',
        'leirasText',
        'Mnev',
        'Anev'
    ];
}
