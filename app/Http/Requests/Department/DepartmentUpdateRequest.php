<?php

namespace sig\Http\Requests\Department;

use sig\Http\Requests\Request;
use Illuminate\Routing\Route;

class DepartmentUpdateRequest extends Request
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
            //
        ];
    }
}
