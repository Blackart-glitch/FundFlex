<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetrieveBanksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /*     public function authorize(): bool
    {
        return false;
    } */


    /**
     * The function `rules` returns an array with a single key-value pair, where the key is 'bank-code'
     * and the value is 'required|string'.
     *
     * @return array An array containing the validation rules for the 'bank-code' field.
     */
    public function rules(): array
    {
        return [
            'BankName' => 'string',
        ];
    }
}
