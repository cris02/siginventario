<?php

namespace sig\Http\Requests\Provider;

use sig\Http\Requests\Request;
use Illuminate\Routing\Route;

class ProviderUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
          //'name'=>'required|unique:providers,name,'.$this->route->getparameter('id'),
        ];
    }
}
