<?php

namespace goiaba\Http\Requests;

use goiaba\Http\Requests\Request;

class UsuariosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricula' => 'required|unique:user,matricula,'.$this->id,
            'nome' => 'required',
            'lotacao' => 'required'
        ];
    }
}
