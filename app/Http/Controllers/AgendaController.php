<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgendaRequest;
use App\Models\ModelAgenda;
use App\User;

class AgendaController extends Controller
{

    private $objUser;
    private $objContato;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objContato = new ModelAgenda();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retorna a camada de visão nomeada do *.blade.php
        $contato = $this->objContato->all();
        return view('index', compact('contato'));
        //dd($this->objUser->find(1)->relContato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->objUser->all();
        return view('cadastro', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaRequest $request)
    {
        $cad= $this->objContato->create([
            'contato'=>$request->contato,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'empresa'=>$request->empresa,
            'id_user'=>$request->id_user
        ]);
        if($cad){
            return redirect('agenda');
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
        $contato = $this->objContato->find($id);
        return view('showcontato', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = $this->objContato->find($id);
        $user = $this->objUser->all();
        return view('cadastro', compact('contato', 'user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaRequest $request, $id)
    {
        $this->objContato->where(['id' => $id])->update([
            'contato'=>$request->contato,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'empresa'=>$request->empresa,
            'id_user'=>$request->id_user
        ]);
        return redirect('agenda/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Pode ser Essa modalidade
        $contato = $this->objContato->find($id);
        // Ou essa a seguir comentada
        //$contato = ModelAgenda::findOrFail($id);
        $contato->delete();

        return redirect('agenda/');

    }
}
