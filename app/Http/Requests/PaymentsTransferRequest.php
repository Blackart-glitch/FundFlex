<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentsTransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //only authenticated users can make this request
        return auth()->check()
            ? true
            : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //currency and amount are required
            'amount' => 'required|numeric',
            'wallet_number' => 'required|string',
            'description' => 'nullable|string',
        ];
    }
}
