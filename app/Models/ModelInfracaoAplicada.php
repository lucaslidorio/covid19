<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelInfracaoAplicada extends Model
{
    
    protected $table = 'infracaoAplicada';
    //libera a permissão para gravar no banco as tabelas relacionada abaixo
    protected $fillable = [
        'idMotivo',
        'idInfracao',
        'idPessoa',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'bairro',
        'data',
        'hora',
        'idUf',
        'obs'
    ];


    public function relPessoa(){
        return $this->hasOne('App\Models\ModelPessoa', 'id', 'idPessoa');
    }
    public function relUf(){
        return $this->hasOne('App\Models\ModelUf', 'id', 'idUf');
    }
    public function relMotivo(){
        return $this->hasOne('App\Models\ModelMotivo', 'id', 'idMotivo');
    }
    public function relInfracao(){
        return $this->hasOne('App\Models\ModelInfracao', 'id', 'idInfracao');
    }
}
