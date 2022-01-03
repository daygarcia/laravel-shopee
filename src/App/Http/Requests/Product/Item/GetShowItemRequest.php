<?php

namespace App\Http\Requests\LaravelShopee\Product\Item;

use Illuminate\Foundation\Http\FormRequest;

class GetShowItemRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->replace(['item_id_list' => explode(',', $this->item_id_list)]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_id_list'          => 'required|array|min:1|max:50',
            'item_id_list.*'        => 'required|integer',
            'need_tax_info'         => 'nullable|boolean',
            'need_complaint_policy' => 'nullable|boolean',
        ];
    }
}
