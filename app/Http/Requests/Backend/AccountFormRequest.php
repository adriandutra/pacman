<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AccountFormRequest extends FormRequest
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
        return ['Name'           => 'required|max:70',
                'Start_Cycle'    => 'max:3',
                'End_Cycle'      => 'max:3',
                'Cycle'          => 'required|max:1',
                'CDR'            => 'required|max:10',
                'CPP'            => 'required|max:10',
                'ID_Sales_Rates' => 'max.10'
            
        ];
    }
}
