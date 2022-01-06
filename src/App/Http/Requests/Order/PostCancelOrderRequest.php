<?php

namespace App\Http\Requests\LaravelShopee\Order;

use Illuminate\Foundation\Http\FormRequest;

class PostCancelOrderRequest extends FormRequest
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
            'cancel_reason' => 'OUT_OF_STOCK,CUSTOMER_REQUEST,UNDELIVERABLE_AREA,COD_NOT_SUPPORTED',
            'item_list' => 'required_if:cancel_reason,OUT_OF_STOCK|array',
            'item_list.*.item_id'  => 'required|integer',
            'item_list.*.model_id' => 'required|integer',
        ];
    }
}
