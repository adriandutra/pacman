<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CRMQueryFormRequest extends FormRequest
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
                 'Name' => 'required|max:50',
                 'IDCRM_Neotel' => 'required',
                 'Date' => 'required|date',
                 'Action' => 'required|max:1',
                 'Field_Document' => 'max:20'
        ];
    }
}
