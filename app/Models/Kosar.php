<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosar extends Model
{
    use HasFactory;

    protected $primaryKey = 'kosar_id';

    protected $fillable = [
        'user_id',
        'kosarLetre'
    ];
}
