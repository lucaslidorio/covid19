<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelMotivo;
use App\Models\ModelPessoa;
use App\Models\ModelUf;
use App\Models\ModelInfracao;
use App\Models\ModelInfracaoAplicada;



class InfracaoAplicadaController extends Controller
{

    //Cria os atributos que irão referenciar ao Model
    private $objMotivo;
    private $objInfracao;
    private $objInfracaoAplicada;
    private $objPessoa;
    private $ObjUf;

    //Cria metodo contrutor
    public function __construct()
    {
        //Declaração dos objejos para trabalhar no banco de dados
        $this->objMotivo = new ModelMotivo();
        $this->objInfracao = new ModelInfracao();
        $this->objInfracaoAplicada = new ModelInfracaoAplicada();
        $this->objPessoa = new ModelPessoa();
        $this->ObjUf = new ModelUf();

        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //dd($this->objInfracaoAplicada->find(1)->relUf);        
        $infracaoAplicada= $this->objInfracaoAplicada->all();
        
        return view('showInfracao', compact('infracaoAplicada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cria uma variável para receber os registro do objeto referenciado
       
        $motivo = $this->objMotivo ->all();
        $infracao = $this->objInfracao->all();
        $infrator = $this->objPessoa->all();
        $uf = $this->ObjUf->all();
        
        return view('createInfracao', compact('motivo', 'infracao', 'infrator', 'uf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Captura os valores da View e envia para o banco
        $cad = $this->objInfracaoAplicada->create([
            'idMotivo' => $request->idMotivo,
            'idInfracao' => $request->idInfracao,
            'idPessoa' => $request->idPessoa,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'data' => $request->data,
            'hora' => $request->hora,
            'idUf' => $request->idUf,
            'obs' => $request->obs,
        ]);
        if($cad){
            return redirect('infracoes');
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
        $infracaoAplicada= $this->objInfracaoAplicada->find($id);
        return view('detalhesInfracao',compact('infracaoAplicada'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    { 
        $infracaoAplicada =$this->objInfracaoAplicada->find($id);
        $infrator= $this->objPessoa->all();
        $motivo=$this->objMotivo->all();
        $infracao = $this->objInfracao->all();
        $uf = $this->ObjUf->all();
        
        return view('editInfracao', compact('infracaoAplicada',
        'infrator', 'motivo', 'infracao', 'uf'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->objInfracaoAplicada ->where(['id'=>$id])->update([
            'idMotivo' => $request->idMotivo,
            'idInfracao' => $request->idInfracao,
            'idPessoa' => $request->idPessoa,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'data' => $request->data,
            'hora' => $request->hora,
            'idUf' => $request->idUf,
            'obs' => $request->obs,

        ]);
        return redirect('infracoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objInfracaoAplicada->destroy($id);
        return($del) ? "Sim":"Nao";
    }
}
