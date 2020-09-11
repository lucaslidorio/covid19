@extends('templates.template')

@section('content')
<h2>Dados Pessoais</h2>

<div class="col-12 m-auto">
@php
    $uf = $pessoa->find($pessoa->id)->relUf;
@endphp

  Nome: {{$pessoa->nome}}<br>
  Nome Fantasia: {{$pessoa->nomeFantasia}}<br>
  Documento: {{$pessoa->documento}}<br>
  Incriçao Estadual: {{$pessoa->inscricaoEstadua}}<br>
  Data Nascimento: {{$pessoa->dataNascimento}}<br>
  Telefone: {{$pessoa->telefone}}<br>
  E-mail: {{$pessoa->email}}<br>
  Endereço: {{$pessoa->endereco}}<br>
  Número: {{$pessoa->numero}}<br>
  Bairro: {{$pessoa->bairro}}<br>
  Cidade: {{$pessoa->cidade}}<br>
  Estado: {{$uf->sigla}}<br>        

</div>

@endsection