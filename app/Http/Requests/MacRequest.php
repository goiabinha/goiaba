<?php

namespace goiaba\Http\Requests;


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
     */

    public function rules()
    {
        return [
            'mac' => 'required|unique:mac,mac,'.$this->id,
            'id_user' => 'required',
            'ticket' => 'required',
            'sei' => 'required',
			'id_dev'=>'required',
        ];
    }
}
