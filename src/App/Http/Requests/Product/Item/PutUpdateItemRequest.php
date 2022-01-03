<?php

namespace App\Http\Requests\LaravelShopee\Product\Item;

use Illuminate\Foundation\Http\FormRequest;

class PutUpdateItemRequest extends FormRequest
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
            'item_id'                    => 'required|numeric',
            'original_price'             => 'nullable|numeric',
            'description '               => 'nullable|string',
            'weight'                     => 'nullable|numeric',
            'item_name'                  => 'nullable|string',
            'item_status'                => 'nullable|string|in:NORMAL,UNLIST',

            'dimension'                  => 'nullable|array',
            'dimension.package_height'   => 'nullable|integer',
            'dimension.package_length'   => 'nullable|integer',
            'dimension.package_width'    => 'nullable|integer',

            'normal_stock'               => 'nullable|integer',

            'logistic_info'              => 'nullable|array',
            'logistic_info.size_id'      => 'nullable|integer',
            'logistic_info.shipping_fee' => 'nullable|numeric',
            'logistic_info.enabled'      => 'nullable|boolean',
            'logistic_info.logistic_id'  => 'nullable|integer',
            'logistic_info.is_free'      => 'nullable|integer',

            'attribute_list'                        => 'nullable|array',
            'attribute_list.*.attribute_id'         => 'nullable|integer',
            'attribute_list.*.attribute_value_list' => 'nullable|array',
            'attribute_list.*.attribute_value_list.*.value_id' => 'nullable|integer',
            'attribute_list.*.attribute_value_list.*.original_value_name' => 'nullable|string',
            'attribute_list.*.attribute_value_list.*.value_unit' => 'nullable_if:attribute_value_list|string',

            'category_id'                => 'nullable|integer',

            'image'                      => 'nullable|array',
            'image.*.image_id_list'      => 'nullable|array',
            'image.*.image_id_list.*'    => 'string',

            'pre_order'                  => 'nullable|array',
            'pre_order.is_pre_order'     => 'nullable|boolean',
            'pre_order.days_to_ship'     => 'nullable|integer',

            'item_sku'                   => 'nullable|string',
            'condition'                  => 'nullable|string',

            'wholesale'                  => 'nullable|array',
            'wholesale.*.min_count'      => 'nullable|integer',
            'wholesale.*.max_count'      => 'nullable|integer',
            'wholesale.*.unit_price'     => 'nullable|numeric',

            'video_upload_id'            => 'nullable|string',

            'brand'                      => 'nullable|array',
            'brand.brand_id'             => 'nullable|integer',
            'brand.original_brand_name'  => 'nullable|string',

            'item_dangerous'             => 'nullable|integer',

            'tax_info'                          => 'nullable|array',
            'tax_info.invoice_option'           => 'nullable|string',
            'tax_info.vat_rate'                 => 'nullable|string',
            'tax_info.hs_code'                  => 'nullable|string',
            'tax_info.tax_code'                 => 'nullable|string',

            'complaint_policy'                  => 'nullable|array',
            'complaint_policy.warranty_time'    => 'nullable|string',
            'complaint_policy.exclude_entrepreneur_warranty' => 'nullable|boolean',
            'complaint_policy.complaint_address_id'     => 'nullable|integer',
            'complaint_policy.additional_information'   => 'nullable|string',
        ];
    }
}
