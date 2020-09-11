@extends('templates.template')

@section('content')
<h2 class="text-center" >Pessoas Cadastradas</h2>

<div class="col-12 m-auto">
  @csrf

    <table class="table table-sm table-hover table-bordered dataTables">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col">Telefone</th>
            <th scope="col">Edereço</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pessoa as $pessoa)
          
          <tr>
            <th scope="row">{{$pessoa->id}}</th>
            <td>{{$pessoa->nome}}</td>
            <td>{{$pessoa->documento}}</td>
            <td>{{$pessoa->telefone}}</td>
            <td>{{$pessoa->endereco}}</td>
            <td>{{$pessoa->cidade}}</td>
            <td>{{$pessoa->relUf->sigla}}</td>
            <td class="text-center text-nowrap">
            <a href="{{url("pessoas/$pessoa->id")}}" >
                    <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Visualizar" >
                      <span data-feather="eye"></span>
                    </button>
                </a>
            
            <a href="{{url("pessoas/$pessoa->id/edit")}}" >
                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
                      <span data-feather="edit"></span>
                    </button>
            </a>
          
            <a href="{{url("pessoas/$pessoa->id")}}" class="js-del" > 
                   <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
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