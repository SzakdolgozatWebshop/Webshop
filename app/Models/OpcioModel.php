<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcioModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'op_id';

    protected $fillable = [
        'szoveg'
    ];
}
