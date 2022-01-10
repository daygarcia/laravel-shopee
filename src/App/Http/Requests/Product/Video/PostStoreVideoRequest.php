<?php

namespace App\Http\Requests\LaravelShopee\Product\Video;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreVideoRequest extends FormRequest
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
            'file_md5'  => 'required|string',
            'file_size' => 'required|integer',
        ];
    }
}
