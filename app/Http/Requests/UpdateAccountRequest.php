<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAccountRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                // Rule::unique('accounts', 'email')->where('product_id', request()->product_id)->where('id', '!=', request()->account->id)
            ],
            'product_id' => 'required',
            'package_id' => 'required',
            'password' => 'required',
            'subscription_date' => 'required|date_format:d/m/Y'
        ];
    }
}
