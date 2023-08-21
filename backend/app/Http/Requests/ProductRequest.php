<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'store_id' => 'required|exists:stores,id,user_id,' . auth()->id(),
            'name' => 'required|string|min:30|max:255',
            'price' => 'required|integer|min:10|max:1000',
        ];
    }
}
