<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
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
            
            'quantity' => 'required|numeric',
            'productid' => 'required|numeric',
            'price' => 'required|numeric',
            
            
        ];
    }
    public function messages(){

        return[
            
            'quantity.required' =>'La cantidad es requerida',
            'quantity.numeric' =>'La cantidad  debe ser numerico',
            'productid.required' =>'El producto debe ser seleccionado',
            'productid.numeric' =>'El producto debe ser numerico',
            
            
            
            
        ];
    }
}
