<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaRequest;
use Illuminate\Http\Request;
use App\Models\ModelPessoa;
use App\Models\ModelUf;


class PessoaController extends Controller
{

    private $objUf;
    private $objPessoa;

    public function __construct()
    {
        $this->objUf = new ModelUf();
        $this->objPessoa = new ModelPessoa();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoa=$this->objPessoa->all();
        return view('index', compact('pessoa'));
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ufs=$this->objUf->all();
        return view('createPessoa', compact('ufs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        $cad = $this->objPessoa->create([
            'nome'=>$request->nome,
            'nomeFantasia'=>$request->nomeFantasia,
            'tipoDocumento'=>$request->tipoDocumento,
            'documento'=>$request->documento,
            'inscricaoEstadual'=>$request->inscricaoEstadual,
            'dataNascimento'=>$request->dataNascimento,
            'telefone'=>$request->telefone,
            'email'=>$request->email,
            'endereco'=>$request->endereco,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade,  
            'idUF'=>$request->idUf,             
            
        ]);
        if($cad){
            return redirect('pessoas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa= $this->objPessoa->find($id);

        return view('show',compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa=$this->objPessoa->find($id);
        $ufs=$this->objUf->all();
        return view('editPessoa', compact('pessoa',    'ufs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaRequest $request, $id)
    {
        $this->objPessoa->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'nomeFantasia'=>$request->nomeFantasia,
            'tipoDocumento'=>$request->tipoDocumento,
            'documento'=>$request->documento,
            'inscricaoEstadual'=>$request->inscricaoEstadual,
            'dataNascimento'=>$request->dataNascimento,
            'telefone'=>$request->telefone,
            'email'=>$request->email,
            'endereco'=>$request->endereco,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade,  
            'idUF'=>$request->idUf, 
        ]);
        return redirect('pessoas');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objPessoa->destroy($id);
        return($del) ? "Sim":"Nao";
    }
}
