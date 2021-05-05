<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendToBankRequest extends FormRequest
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
            'bankid'=>'required',
            'observation'=>'required',
            'pmId'=>'required',
            'from'=>'required'

        ];
    }
}
