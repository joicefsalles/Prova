<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaDadosModel extends Model
{
    protected $fillable = [
        'n_conta','valor', 
    ];
}
