<?php

namespace sig\Http\Requests\Provider;

use sig\Http\Requests\Request;

class ProviderCreateRequest extends Request
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
            'id'=>'required|unique:providers',
            'name'=>'required|unique:providers|regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-]*$/ ',
            'direction'=>'regex: /^[a-zA-Z0-9áéíóúñÑ,\s\-]*$/ ',
            'seller'=>'regex: /^[a-zA-Z0-9áéíóúñÑ,\s]*$/',
        ];
    }
}
