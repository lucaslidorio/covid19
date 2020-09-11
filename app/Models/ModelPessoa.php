<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPessoa extends Model
{
    protected $table='pessoa';
    protected $fillable =['nome',  'nomeFantasia', 'tipoDocumento', 'documento', 'inscricaoEstadual',
    'dataNascimento',  'telefone', 'email','endereco','numero','bairro','cidade','idUF'];


    public function relUf(){
        return $this->hasOne('App\Models\ModelUf', 'id', 'idUf');
    }
    public function relInfracaoAplicada(){
        return $this->hasMany('App\Models\InfracaoAplicada', 'idPessoa');
    }
    
}
