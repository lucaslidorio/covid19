<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelMotivo extends Model
{
    //Define a Tabela a ser usada
    protected $table='motivo';

    public function relInfracaoAplicada()
    {
        return $this->hasMany('App\Models\ModelInfracaoAplicada', 'idMotivo');
    }
}
