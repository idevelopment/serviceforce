<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServerCreateValidator extends Request
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
            'serverPool' => 'required',
            'startDate'  => 'required',
            'modelID'    => 'required',
            'os'         => 'required',
        ];
    }
}
