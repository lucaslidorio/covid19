<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelInfracao extends Model
{
    protected $table = 'infracao';


    public function relInfracaoAplicada()
    {
        return $this->hasMany('App\Models\ModelInfracaoAplicada' ,  'idInfracao');
    }
}


