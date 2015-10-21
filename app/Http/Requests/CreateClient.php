<?php

namespace autoecole\Http\Requests;

use autoecole\Http\Requests\Request;

class CreateClient extends Request
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
            'name'    => 'required|alpha',
            'prenom'  => 'required|alpha',
            'email'   => 'required|email',
            'adresss' => 'required',
            'tel'     => 'required',
            'date_naisssance' => 'required|date',
            'type_piece' => 'required',
            'num_piece' => 'required'
        ];
    }
}
