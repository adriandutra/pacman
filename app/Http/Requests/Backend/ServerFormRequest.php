<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ServerFormRequest extends FormRequest
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
                 'Name'          => 'required|max:50',
                 'Island_Number' => 'required|max:10',
                 'URI'           => 'required|max:50',                 
                 'DB_connection' => 'required|max:150'
        ];
    }
}
