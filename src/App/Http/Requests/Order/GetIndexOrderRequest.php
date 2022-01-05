<?php

namespace App\Http\Requests\LaravelShopee\Order;

use Illuminate\Foundation\Http\FormRequest;

class GetIndexOrderRequest extends FormRequest
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
            'time_range_field' => 'nullable|in:create_time,update_time',
            'time_from' => 'nullable|date:unix',
            'time_to' => 'nullable|date:unix',
            'page_size' => 'nullable|integer',
            'cursor' => 'nullable|string',
            'order_status' => 'nullable|string|in:UNPAID,READY_TO_SHIP,PROCESSED,SHIPPED,COMPLETED,IN_CANCEL,CANCELLED,INVOICE_PENDING',
            'response_optional_fields' => 'nullable|string|in:order_status',
        ];
    }
}
