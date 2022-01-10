<?php

namespace App\Http\Requests\LaravelShopee\Logistics\BatchOrder;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreBatchOrderRequest extends FormRequest
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
            'order_list'                    => 'required|array',
            'order_list.*.order_sn'         => 'required|string',
            'order_list.*.package_number'   => 'required|string',

            'pickup'                        => 'nullable',
            'pickup.address_id'             => 'required_with:pickup|integer',
            'pickup.pickup_time_id'         => 'required_with:pickup|string',
            'pickup.tracking_number'        => 'required_with:pickup|string',

            'dropoff'                       => 'nullable',
            'dropoff.branch_id'             => 'required_with:dropoff|integer',
            'dropoff.sender_real_name'      => 'required_with:dropoff|string',
            'dropoff.tracking_number'       => 'required_with:dropoff|string',

            'non_integrated'                    => 'nullable',
            'non_integrated.tracking_number'    => 'required_with:non_integrated|string',
        ];
    }
}
