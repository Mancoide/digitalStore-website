<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'document_number' => 'required',
            'fullname'        => 'required',
            'username'        => [
                'required',
                Rule::unique('users')->ignore(request()->user ? request()->user->id : 0),
            ],
            'email'           => 'required|email',
            // 'password'        => 'required',
            'rol_id'          => 'required'
        ];
    }
}
