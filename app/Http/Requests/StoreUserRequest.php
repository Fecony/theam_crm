<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'username' => ['required'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'email' => [
                'description' => 'User email',
                'example' => 'email@example.com'
            ],
            'username' => [
                'description' => 'User username',
                'example' => 'Example github username',
            ],
        ];
    }
}
