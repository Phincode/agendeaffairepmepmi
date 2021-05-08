<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pmeTakeRDVRequest extends FormRequest
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
          'nomProprietaire' => "required",
          'emailProprietaire'=>"required|email",
          'numeroProprietaire'=>"required",
          'nomGerant'=>"required",
          'emailGerant'=>"required|email",
          'numeroGerant'=>"required",
          'activite'=>"required",
          'dateCreation'=>"required",
          'codePme'=>"nullable",
          'typePme'=>"required|integer",
          'filledUserId'=>"required|integer",
          'besoinFinancement'=>"required",
          'localisation'=>'required',
          'dateRdv'=>'required',
          'plageHoraire'=>'required',
        ];
    }
}
