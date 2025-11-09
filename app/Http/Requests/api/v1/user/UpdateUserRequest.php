<?php

namespace App\Http\Requests\api\v1\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'sometimes|required|string',
            'email' => 'sometimes|required|email|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|required|string|min:6'
        ];
    }
}
