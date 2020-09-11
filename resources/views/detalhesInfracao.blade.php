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
<h1 class="text-center"></h1>
<div class="container-fluid">
    <div class="col-12 mt-4">
        @php
        $pessoa = $infracaoAplicada->find($infracaoAplicada->id)->relPessoa;
        $motivo = $infracaoAplicada->find($infracaoAplicada->id)->relMotivo;
        $infracao = $infracaoAplicada->find($infracaoAplicada->id)->relInfracao;
        $uf = $infracaoAplicada->find($infracaoAplicada->id)->relUf;
        @endphp

        


                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th colspan="12" scope="col" class="text-center">Identificacao da Infração</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="12"> FNT012F000001</td>
                        </tr>
                        <tr>
                            <td>Protocolo:</td>
                            <td colspan="10">---</td>
                        </tr>
                        <tr>
                            <td colspan="12" class="text-center font-weight-bold "> Motivo da Infração</td>
                        </tr>
                        <tr>
                            <td colspan="3">Informe o motivo:</td>
                            <td colspan="9">{{ $motivo->descricao }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">Descrição da Infração:</td>
                            <td colspan="9"> {{ $infracao->codigo }} - {{ $infracao->descricao }}</td>

                        </tr>
                        <tr>
                            <td colspan="3">Amparo legal:</td>
                            <td colspan="9"> {{ $infracao->amparoLegal }}</td>
                        </tr>
                        <tr>
                            <td class="text-center font-weight-bold" colspan="12">Identificação do Infrator</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                RG do Infrator:
                            </td>
                            <td>
                                --
                            </td>
                            <td colspan="1">Uf do Órgão Expedidor</td>
                            <td>--</td>
                            <td>Orgão Expedidor:</td>
                            <td>--</td>
                        </tr>
                        <tr>
                            <td>Nome do Infrator:</td>
                            <td colspan="9">{{ $pessoa->nome }}</td>
                        </tr>
                        <tr>
                            <td>CPF/CNPJ</td>
                            <td colspan="10">{{ $pessoa->documento }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Endereço do infrator:</td>
                            <td colspan="8">
                                {{ $pessoa->endereco }},
                                {{ $pessoa->numero }},
                                {{ $pessoa->bairro }},
                                {{ $pessoa->cidade }},
                                {{$pessoa->relUf->sigla}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" class="text-center font-weight-bold">Indentificação do local da Infração</td>
                        </tr>
                        <tr>
                            <th>Endereço da Infração:</th>
                            <td colspan="10">
                                {{ $infracaoAplicada->endereco }},
                                {{ $infracaoAplicada->numero }},
                                {{ $infracaoAplicada->bairro }},
                                {{ $infracaoAplicada->cidade }} -
                                {{ $uf->sigla }}
                            </td>
                        </tr>
                        <tr>
                            <td>Data:</td>
                        <td colspan="10"> {{$infracaoAplicada->data}}</td>
                        </tr>
                        <tr>
                            <td>Hora: </td>
                        <td colspan="10"> {{$infracaoAplicada->hora}}</td>
                        </tr>
                        <tr>
                            <td colspan="12" class="text-center font-weight-bold">Observação</td>
                        </tr>
                        <tr>
                        <td colspan="12">{{$infracaoAplicada->obs}}</td>
                        </tr>
                    </tbody>
                </table>





                <a href="{{ url('infracoes') }}" class="btn btn-primary">Voltar</a>
        

    </div>
</div>


@endsection
