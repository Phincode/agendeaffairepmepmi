<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class particulierTakeRDVRequest extends FormRequest
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
          'nom'=>"required",
          'age' => "required",
          'numerotel'=>"required",
          'numerotel2'=>"required",
          'niveau'=>"required",
          'ecole'=>"required",
          'localisation'=>"required",
          'activite'=>"required",
          'ancienNouveau'=>"nullable",
          'periode'=>"nullable",
          'daterdv1'=>"required",
          'plageHoraire'=>"required",
        ];
    }
}
