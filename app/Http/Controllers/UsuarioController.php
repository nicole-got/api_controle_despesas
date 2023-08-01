<?php

namespace App\Http\Controllers;

use App\Models\Usuario as Usuario;
use App\Http\Resources\Usuario as UsuarioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        return UsuarioResource::collection($usuario);
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
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->nome      = $request->input('nome');
        $usuario->email     = $request->input('email');
        $usuario->password  = Hash::make($request->input('senha'));

        if( $usuario->save() ){
            return new UsuarioResource( $usuario );
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
        $usuario = Usuario::findOrFail( $id );
        return new UsuarioResource( $usuario );
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
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail( $request->id );
        $usuario->nome      = $request->input('nome');
        $usuario->email     = $request->input('email');
        $usuario->password  = $request->input('password');
    
        if( $usuario->save() ){
          return new UsuarioResource( $usuario );
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
        $usuario = Usuario::findOrFail( $id );
        if( $usuario->delete() ){
          return new UsuarioResource( $usuario );
        }
    }
}
