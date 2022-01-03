<?php

namespace App\Http\Requests\LaravelShopee\Logistics\Channel;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateChannelRequest extends FormRequest
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
            'logistics_channel_id' => 'required|integer',
            'enabled'              => 'nullable|boolean',
            'preferred'            => 'nullable|boolean',
            'cod_enabled'          => 'nullable|boolean',
        ];
    }
}
