<?php

namespace App\Http\Requests\LaravelShopee\Order\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreInvoiceRequest extends FormRequest
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
            'order_sn'                              => 'required|string',
            'invoice_data'                          => 'required',
            'invoice_data.number'                   => 'required|string',
            'invoice_data.series_number'            => 'required|string',
            'invoice_data.access_key'               => 'required|string',
            'invoice_data.issue_date'               => 'required|date',
            'invoice_data.total_value'              => 'required|numeric',
            'invoice_data.products_total_value'     => 'required|numeric',
            'invoice_data.tax_code'                 => 'required|string',
        ];
    }
}
