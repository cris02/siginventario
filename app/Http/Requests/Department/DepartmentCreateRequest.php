<?php

namespace sig\Http\Requests\Department;

use sig\Http\Requests\Request;

class DepartmentCreateRequest extends Request
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
            //
        'code'=>'required|unique:departments',
            'name'=>'required|unique:departments',
        ];
    }
}
