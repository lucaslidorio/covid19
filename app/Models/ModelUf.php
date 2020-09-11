<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUf extends Model
{
    protected $table='uf';
    
    public function relPessoa(){
        return $this->hasMany('App\Models\ModelPessoa', 'idUf');
    }
    public function relInfracaoAplicada()
    {
        return $this->hasMany('App\Model\ModelInfracaoAplicada', 'idUf');
    }
    
}
