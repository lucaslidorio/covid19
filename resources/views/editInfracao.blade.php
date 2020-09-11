<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

</html>
@extends('templates.template')


@section('content')
    <div class="col-12 m-auto">

            
                <form name="formEditInf" id="formEditInf" method="post" action="{{ url("infracoes/$infracaoAplicada->id") }}">
               @method('PUT')
          
                
           

           @csrf
            <div class="container container-fluid mt-2" id="containerFormulario">
                <h2 class="text-center"> Editar Infraçao</h2>
                <hr />

                <div class="form-row">
                    <p class="font-weight-bold ">Protocolo: XXXXX</p>
                </div>
                <span class="border-bottom font-weight-bold">Identificação do Auto</span>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="data" class="col-form-label">Data:</label>
                        <input type="date" class="form-control" id="data" name="data" value="{{ $infracaoAplicada->data}}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hora" class="col-form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora" value="{{ $infracaoAplicada->hora}}" />
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="idMotivo" class="col-form-label">Informe o Motivo:</label>
                        <select class="form-control" name="idMotivo" id="idMotivo" name="idMotivo" required="required"
                            value="">
                        <!-- Recebe o dados do relacionamento e mostra no select -->
                         <option value="{{$infracaoAplicada->relMotivo->id}}">{{$infracaoAplicada->relMotivo->descricao }} </option>

                        <!-- Recebe a variável que é passada pelo controller e apresenta os registro
                                        no select -->
                            @foreach ($motivo as $motivos)
                                <option value="{{ $motivos->id }}">{{ $motivos->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="idInfracao" class="col-form-label">Motivo da Infração:</label>
                        <select class="form-control " name="idInfracao" id="idInfracao" name="idInfracao"
                            required="required" value="">
                            <option value="{{$infracaoAplicada->relInfracao->id}}">{{$infracaoAplicada->relInfracao->descricao}}</option>
                            <!-- Recebe a variável que é passada pelo controller e apresenta os registro
                                        no select -->
                            @foreach ($infracao as $infracoes)
                                <option value="{{ $infracoes->id }}">{{ $infracoes->descricao }}</option>

                            @endforeach

                        </select>
                    </div>
                </div>


                <span class="border-bottom font-weight-bold">Identificação do Infrator</span>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="idPessoa" class="col-form-label">Infrator</label>
                        <select class="form-control " name="idPessoa" id="idPessoa" required="required" value="">
                            <option value="{{$infracaoAplicada->relPessoa->id}}">{{$infracaoAplicada->relPessoa->nome}}</option>
                            @foreach ($infrator as $infratores)
                                <option value="{{ $infratores->id }}">{{ $infratores->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="enderecoInfrator" class="col-form-label">Endereço:</label>
                        <input type="text" class="form-control" id="enderecoInfrator" name="enderecoInfrator" 
                        value="{{$infracaoAplicada->relPessoa->endereco}}"  disabled="true" />
                    </div>
                </div>
                <span class="border-bottom font-weight-bold">Identificação do Local da Infração</span>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="endereco" class="col-form-label">Rua:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco"
                            placeholder="Ex: Rua, Avenida Etc..." value="{{ $infracaoAplicada->endereco}}" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero" class="col-form-label">Número:</label>
                        <input type="text" class="form-control" id="numero" name="numero"
                            value="{{ $infracaoAplicada->numero }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro" class="col-form-label">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" name="bairro"
                            value="{{ $infracaoAplicada->bairro }}" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="cidade" class="col-form-label">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade"
                            value="{{ $infracaoAplicada->cidade}}" />
                    </div>
                    <div class="form-group col-md-2">

                        <label for="uf" class="col-form-label">UF:</label>
                        <select class="form-control " name="idUf" id="idUf" required="required">
                            <option value="{{$infracaoAplicada->relUf->id}}">{{$infracaoAplicada->relUf->sigla}}</option>
                            <!-- Recebe a variável que é passada pelo controller e apresenta os registro
                                        no select -->
                            @foreach ($uf as $ufs)
                                <option value="{{ $ufs->id }}">{{ $ufs->sigla }}</option>

                            @endforeach

                        </select>

                    </div>

                </div>
                <div class="form-row mb-3">
                    <label for="obs" class="col-form-label">Obs</label>
                    <textarea class="form-control" name="obs" id="obs" cols="15" rows="2" >{{ $infracaoAplicada->obs}}</textarea>
                </div>
                <div class="form-row mb-5">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                        <input class="btn btn-primary" type="submit" value="Editar">
                    </div>
                    <div class="col-md-5">
                    </div>
                </div>
            </div>


    </div>






    </div>



    </form>
    </div>


@endsection
