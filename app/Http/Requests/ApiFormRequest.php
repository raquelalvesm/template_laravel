<?php

namespace App\Http\Requests;

use Dotenv\Exception\ValidationException;
use Dotenv\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class ApiFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
   abstract  public function authorize();
    /** 
   * @param Validator $validator
   * @return void
   */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();
    /**
     * @return bool

     */

    // public function failedValidation (Validator $validator)
    // {
    //    $errors = (new ValidationException($validator))->errors();

    //    throw new HttpResponseException(
    //        response()->json(['errors'=> $errors], JsonResponse:HTTP_UNPROCESSABLE_ENITY)
    //    );
    // }
}
