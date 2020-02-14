<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Vanilo\Product\Models\ProductState;

class CreateProduct extends FormRequest
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
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name'     => 'required|min:2|max:255',
            'sku'      => 'required|unique:products',
            'state'    => ['required', Rule::in(ProductState::values())],
            'price'    => 'nullable|numeric',
            'stock'    => 'nullable|numeric',
            'images'   => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }
}
