<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rend_tetel extends Model
{
    use HasFactory;


    protected $primaryKey = 'composite_key';

    /* protected $primaryKey = [
        'rend_szam',
        'Termek'
    ]; */

    protected $fillable = [
        'menny',
        'ar',
        'csomagolva',
        'allapot'
    ];

    public function getCompositeKeyAttribute()
    {
        return $this->rend_szam . '_' . $this->Termek;
    }
}
