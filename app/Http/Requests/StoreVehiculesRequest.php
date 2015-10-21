<?php

namespace autoecole\Http\Requests;

use autoecole\Http\Requests\Request;

class StoreVehiculesRequest extends Request
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
            'matricule' => 'required',
            'date_visite_technique' => 'required|date',
            'date_fin_assurence' => 'required|date',
            'vidange' => 'required'
        ];
    }
}
