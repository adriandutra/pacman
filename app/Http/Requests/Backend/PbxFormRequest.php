<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PbxFormRequest extends FormRequest
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
        return [ 'Name'          => 'required|max:50',
                 'URI'           => 'required|max:15',
                 'Location'      => 'required|max:50',
                 'Folder'        => 'max:200',
                 'FileName'      => 'max:50',
                 'DB_connection' => 'max:150' 
        ];
    }
}
