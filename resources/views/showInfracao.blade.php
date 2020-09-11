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
<h2 class="text-center" >Pessoas Cadastradas</h2>
    <div class="col-12 m-auto">
        @csrf
             <table class="table table-sm table-responsive table-bordered table-hover dataTables">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Protocolo</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Data</th>
                                <th scope="col">Infrator</th>
                                <th scope="col">CPF/CNPJ</th>   
                                                            
                                <th scope="col"  class="text-center">Ações</th>                              
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infracaoAplicada as $infracoesAplicadas)
                                @php
                                $infracao = $infracoesAplicadas->find($infracoesAplicadas->id)->relInfracao;
                                $motivo = $infracoesAplicadas->find($infracoesAplicadas->id)->relMotivo;
                                $pessoa = $infracoesAplicadas->find($infracoesAplicadas->id)->relPessoa;
                                $uf = $infracoesAplicadas->find($infracoesAplicadas->id)->relUf;
                                @endphp

                                <tr>
                                    <th scope="row">{{ $infracao->codigo }}</th>
                                    <td>-</td>
                                    <td>{{ $motivo->descricao }}</td>
                                    <td>
                                        {{ $infracoesAplicadas->endereco }},
                                        {{ $infracoesAplicadas->bairro }} -
                                        {{ $infracoesAplicadas->cidade }} -
                                        {{ $uf->sigla }}
                                    </td>
                                    <td>{{ $infracoesAplicadas->id }}</td>
                                    <td>{{ $pessoa->nome }}</td>
                                    <td>{{ $pessoa->documento }}</td>
                                    <td class="text-center text-nowrap ">
                                    <a href="{{url("infracoes/$infracoesAplicadas->id")}}">
                                            <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Visualizar"   >
                                                <span data-feather="eye"></span>
                                            </button>
                                    </a>
                                    
                                    <a href="{{url("infracoes/$infracoesAplicadas->id/edit")}}">
                                            <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" >
                                                <span data-feather="edit"></span>
                                            </button>
                                    </a>
                                    
                                    <a href="{{url("infracoes/$infracoesAplicadas->id")}}" class="">
                                            <button class="btn btn-danger " data-toggle="tooltip" data-placement="top" title="Excluir">
                                                <span data-feather="x-square"></span>
                                            </button>
                                        </a>


                                    </td>
                                   
                                
                                </tr>


                            @endforeach

                        </tbody>
                    </table>



            
    </div>


@endsection
