<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|min:2|max:40',
            'category_id' => 'required',
            'restock_value' => 'numeric|min:0',
            'sell_value' => 'numeric|min:0',
            'subtitle' => 'max:1000'
        ];
    }
}
