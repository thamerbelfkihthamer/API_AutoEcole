<?php

namespace autoecole\Http\Requests;

use autoecole\Http\Requests\Request;

class StoreMoniteurRequest extends Request
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
            'name' => 'required',
            'prenom' => 'required',
            'cin' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ];
    }
}
