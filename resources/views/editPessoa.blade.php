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
    <div class="col-12 m-auto" >
         <form name="formEditPess" id="formEditPess" method="PUT" action="{{ url("pessoas/$pessoa->id") }}">
            @method('PUT')
          
            @csrf
            <div class="container container-fluid mt-2" id="containerFormulario">
                <h2 class="text-center">  Editar Pessoas    </h2> 
                
                <hr />

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="pessoa" class="col-form-label">Tipo Pessoa:<span class="obrigatorio">*</span></label>
                        <select class="form-control" id="tipoDocumento" name="tipoDocumento" required="required">

                            <option value="{{ $pessoa->tipoDocumento }}">
                                @if ($pessoa->tipoDocumento == '1')
                                    Fisica
                                @else
                                    Juridica
                                @endif
                            </option>
                            <option value="1">Fisica</option>
                            <option value="2">Juridica</option>


                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cpfCnpj" class="col-form-label  " id="labelCpfCnpj">CPF / CNPJ:<span
                                class="obrigatorio">*</span></label>
                        <input class="form-control " id="documento" name="documento" disabled="disabled "
                            required="required" placeholder="Escolha o tipo de pessoa" value="{{ $pessoa->documento }}" />
                        <!-- <input type='text' class="form-control  " id="cpf" placeholder="CPF"/>
                                    <input type='text' class="form-control  " id="cnpj" placeholder="CNPJ"/>
                                    -->
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nome" class="col-form-label" id="labelNomeRazao">Razão Social:<span
                                class="obrigatorio">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" required="required"
                            required="required" value="{{ $pessoa->nome }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="nomeFantasia" class="col-form-label">Nome Fantasia:</label>
                        <input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia"
                            value="{{ $pessoa->nomeFantasia }}" />
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inscricaoEstadual" class="col-form-label">Inscrição Estadual:</label>
                        <input type="text" class="form-control" id="inscricaoEstadual" name="inscricaoEstadual"
                            value="{{ $pessoa->inscricaoEstadual }}" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="dataNascimento" class="col-form-label">Data Nascimento:</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento"
                            value="{{ $pessoa->dataNascimento }}" />
                    </div>

                    <div class="form-group col-md-2">
                        <label for="telefone" class="col-form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone"
                            value="{{ $pessoa->telefone }}" />
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $pessoa->email }}" />
                    </div>
                    <div class="form-group col-md-5">
                        <label for="endereco" class="col-form-label">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco"
                            placeholder="Ex: Rua, Avenida Etc..." value="{{ $pessoa->endereco }}" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numero" class="col-form-label">Número:</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="{{ $pessoa->numero }}" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="bairro" class="col-form-label">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $pessoa->bairro }}" />
                    </div>
                    <div class="form-group col-md-7">
                        <label for="cidade" class="col-form-label">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $pessoa->cidade }}" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uf" class="col-form-label">UF:</label>
                        <select class="form-control" name="idUf" id="idUf" name="idUf" required="required"
                            value="{{ $pessoa->email }}">

                            <option value="{{ $pessoa->relUf->id ?? '' }}">{{ $pessoa->relUf->sigla ?? '' }}</option>
                            @foreach ($ufs as $uf)
                                <option value="{{ $uf->id }}">{{ $uf->sigla }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                        <input class="btn btn-primary" type="submit" value="Editar">
                    </div>
                    <div class="col-md-5">
                    </div>
                </div>


            </div>

        </form>
    </div>


@endsection
