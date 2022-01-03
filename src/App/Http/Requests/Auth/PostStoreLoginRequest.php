<?php

namespace App\Http\Requests\LaravelShopee\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreLoginRequest extends FormRequest
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
            'code'          => 'required_without:refresh_token|string',
            'refresh_token' => 'required_without:code|string',
        ];
    }
}
