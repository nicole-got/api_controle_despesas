<?php

namespace App\Policies;

use App\Models\Despesa;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class DespesaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Usuario $usuario)
    {
        return $usuario->id == $despesa->idUsuario;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Usuario $usuario, Despesa $despesa)
    {
        return $usuario->id == $despesa->idUsuario;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Usuario $usuario, Despesa $despesa)
    {
        return $usuario->id == $despesa->idUsuario;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Usuario $usuario, Despesa $despesa)
    {
        return $usuario->id == $despesa->idUsuario;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Usuario $usuario, Despesa $despesa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Usuario $usuario, Despesa $despesa)
    {
        return $usuario->id == $despesa->idUsuario;
    }
}
