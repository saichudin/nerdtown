<?php
/**
 * Created by PhpStorm.
 * User: jowy
 * Date: 2/9/20
 * Time: 8:09 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateMedia extends FormRequest
{

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'images'   => 'required',
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
