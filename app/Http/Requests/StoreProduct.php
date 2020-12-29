<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'image' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required',
            'qty' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nama harus diisi',
            'image.required'    => 'Gambar harus diisi',
            'product_category_id.required'  => 'Jenis harus diisi',
            'price.required'    => 'Harga harus diisi',
            'price.numeric' => 'Harus diisi angka',
            'quantity.required'   => 'Kondisi harus diisi',
            'qty.required'     => 'Jumlah harus diisi',
            'qty.numeric' => 'Harus diisi angka',
        ];
    }
}
