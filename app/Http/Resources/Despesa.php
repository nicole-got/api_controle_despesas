<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Despesa extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'idUsuario' => $this->idUsuario,
            'descricao' => $this->descricao,
            'data'      => $this->data,
            'valor'     => $this->valor,
            'usuario'   => $this->usuario ? $this->usuario->nome : null
          ];
    }
}
