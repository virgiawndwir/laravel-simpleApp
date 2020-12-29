<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'name' => 'required',
            'product_category_id' => 'required',
            'image' => 'nullable',
            'price' => 'required|numeric',
            'quantity' => 'required',
            'qty' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nama harus diisi',
            'product_category_id.required'  => 'Jenis harus diisi',
            'price.required'    => 'Harga harus diisi',
            'quantity.required'   => 'Kondisi harus diisi',
            'qty.required'     => 'Jumlah harus diisi',
        ];
    }
}
