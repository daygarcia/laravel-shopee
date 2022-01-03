<?php

namespace App\Http\Requests\LaravelShopee\Product\Item;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreItemRequest extends FormRequest
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
            'original_price'             => 'required|numeric',
            'description '               => 'required|string',
            'weight'                     => 'nullable|numeric',
            'item_name'                  => 'required|string',
            'item_status'                => 'nullable|string|in:NORMAL,UNLIST',

            'dimension'                  => 'nullable|array',
            'dimension.package_height'   => 'required_if:dimension|integer',
            'dimension.package_length'   => 'required_if:dimension|integer',
            'dimension.package_width'    => 'required_if:dimension|integer',

            'normal_stock'               => 'required|integer',

            'logistic_info'              => 'required|array',
            'logistic_info.size_id'      => 'nullable|integer',
            'logistic_info.shipping_fee' => 'nullable|numeric',
            'logistic_info.enabled'      => 'required|boolean',
            'logistic_info.logistic_id'  => 'required|integer',
            'logistic_info.is_free'      => 'nullable|integer',

            'attribute_list'                        => 'nullable|array',
            'attribute_list.*.attribute_id'         => 'required_if:atribute_list|integer',
            'attribute_list.*.attribute_value_list' => 'required_if:atribute_list|array',
            'attribute_list.*.attribute_value_list.*.value_id' => 'required_if:attribute_value_list|integer',
            'attribute_list.*.attribute_value_list.*.original_value_name' => 'required_if:attribute_value_list|string',
            'attribute_list.*.attribute_value_list.*.value_unit' => 'required_if:attribute_value_list|string',

            'category_id'                => 'required|integer',

            'image'                      => 'required|array',
            'image.*.image_id_list'      => 'required|array',
            'image.*.image_id_list.*'    => 'string',

            'pre_order'                  => 'nullable|array',
            'pre_order.is_pre_order'     => 'required_if:pre_order|boolean',
            'pre_order.days_to_ship'     => 'required_if:pre_order|integer',

            'item_sku'                   => 'nullable|string',
            'condition'                  => 'nullable|string',

            'wholesale'                  => 'nullable|array',
            'wholesale.*.min_count'      => 'required_if:wholesale|integer',
            'wholesale.*.max_count'      => 'required_if:wholesale|integer',
            'wholesale.*.unit_price'     => 'required_if:wholesale|numeric',

            'video_upload_id'            => 'nullable|string',

            'brand'                      => 'nullable|array',
            'brand.brand_id'             => 'required_if:brand|integer',
            'brand.original_brand_name'  => 'required_if:brand|string',

            'item_dangerous'             => 'nullable|integer',

            'tax_info'                          => 'nullable|array',
            'tax_info.invoice_option'           => 'nullable|string',
            'tax_info.vat_rate'                 => 'nullable|string',
            'tax_info.hs_code'                  => 'required_if:tax_info|string',
            'tax_info.tax_code'                 => 'required_if:tax_info|string',

            'complaint_policy'                  => 'nullable|array',
            'complaint_policy.warranty_time'    => 'required_if:complaint_policy|string',
            'complaint_policy.exclude_entrepreneur_warranty' => 'required_if:complaint_policy|boolean',
            'complaint_policy.complaint_address_id'     => 'required_if:complaint_policy|integer',
            'complaint_policy.additional_information'   => 'required_if:complaint_policy|string',
        ];
    }
}
