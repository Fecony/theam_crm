<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'surname' => ['required'],
            'photo_id' => ['nullable', 'exists:photos,id']
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Customer name',
                'example' => 'Example name'
            ],
            'surname' => [
                'description' => 'Customer surname',
                'example' => 'Example surname',
            ],
            'photo_id' => [
                'description' => 'Photo id',
                'example' => '1'
            ],
        ];
    }
}
