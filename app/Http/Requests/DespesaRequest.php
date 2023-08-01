<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Usuario;
use Carbon\Carbon;

class DespesaRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'        => 'integer',
            'descricao' => 'required|string|max:191',
            'valor'     => 'required|numeric|gt:0',
            'data'      => ['required', 'date', function ($attribute, $value, $fail) {
                $dataAtual = Carbon::now();

                if (Carbon::parse($value)->isAfter($dataAtual)) {
                    $fail('A data deve ser anterior à data atual.');
                }
            }],
            'idUsuario' => [ 'required',  'integer', function ($attribute, $value, $fail) {
                    $user = Usuario::find($value);

                    if (!$user) {
                        $fail('O ID de usuário não existe.');
                    }
                },
            ],
        ];
    }
}
