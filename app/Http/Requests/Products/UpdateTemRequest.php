<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemRequest extends FormRequest
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
            'weight' => 'numeric',
            'ayar' => 'numeric' ,
            'fi' =>  'numeric',
            'price' => 'numeric',
            'product_info' => 'min:3|string',
            'type' => 'min:3|string'
        ];
    }
}
