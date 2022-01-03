<?php

namespace App\Http\Requests\LaravelShopee\Product\Item;

use Illuminate\Foundation\Http\FormRequest;

class GetIndexItemRequest extends FormRequest
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
        $this->replace(['item_status' => explode(',', $this->item_status)]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'offset'            => 'required|integer',
            'page_size'         => 'required|integer',
            'item_status.*'     => 'required|in:NORMAL,BANNED,DELETED,UNLIST',
            'update_time_from'  => 'required|timestamp',
            'update_time_to'    => 'required|timestamp',
        ];
    }
}
