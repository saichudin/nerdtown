<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Vanilo\Product\Models\ProductState;

class UpdateProduct extends FormRequest
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'sku'  => [
                'required',
                Rule::unique('products')->ignore($this->route('product')->id),
            ],
            'state'    => ['required', Rule::in(ProductState::values())],
            'price'    => 'nullable|numeric',
            'stock'    => 'nullable|numeric',
            'images'   => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }

    /**
     * @inheritDoc
     */
    public function authorize()
    {
        return true;
    }
}
