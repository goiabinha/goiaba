<?php

namespace goiaba\Http\Requests;

use goiaba\Http\Requests\Request;

class MacRequest extends Request
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
			'mac'=>'required',
			'id_user'=>'required',
			'id_dev'=>'required',
			'ativo=>'required'
        ];
    }
}
