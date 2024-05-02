<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termek_jellemzo extends Model
{
    use HasFactory;

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('Termek', '=', $this->getAttribute('ter_id'))
            ->where('Tulajdonsag', '=', $this->getAttribute('tul_id'));


        return $query;
    } 

    protected $primaryKey = 'composite_key';

    protected $fillable = [
        'Termek',
        'Tulajdonsag',
        'ertek'
    ];

}
