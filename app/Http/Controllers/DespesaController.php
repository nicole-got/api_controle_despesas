<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Despesa as Despesa;
use App\Http\Resources\Despesa as DespesaResource;
use Illuminate\Http\Request;
use App\Http\Requests\DespesaRequest;
use App\Notifications\NovaDespesaNotification;
use App\Models\Usuario;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despesa = Despesa::get();
        return DespesaResource::collection($despesa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DespesaRequest $request)
    {
        $despesa = new Despesa;
        $despesa->idUsuario = $request->input('idUsuario');
        $despesa->descricao = $request->input('descricao');
        $despesa->data      = $request->input('data');
        $despesa->valor     = $request->input('valor');

        if( $despesa->save() ){
            $usuarioResponsavel = Usuario::find($request->input('idUsuario'));
            $usuarioResponsavel->notify(new NovaDespesaNotification());
            return new DespesaResource( $despesa );
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
        $despesa = Despesa::findOrFail( $id );
        $this->authorize('view', $despesa);
        return new DespesaResource( $despesa );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DespesaRequest $request, $id)
    {
        $despesa = Despesa::findOrFail( $request->id );
        $this->authorize('update', $despesa);
        
        $despesa->idUsuario = $request->input('idUsuario');
        $despesa->descricao = $request->input('descricao');
        $despesa->data      = $request->input('data');
        $despesa->valor     = $request->input('valor');
    
        if( $despesa->save() ){
          return new DespesaResource( $despesa );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = Despesa::findOrFail( $id );
        $this->authorize('delete', $despesa);

        if( $despesa->delete() ){
          return new DespesaResource( $despesa );
        }
    }
}
