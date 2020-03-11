<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class CreateDetailRequest extends FormRequest
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
             'transaction_id' => 'required',
             'product_id' => 'required|numeric',
             'quantity' => 'required|numeric',
             'price_unit' => 'required|numeric',

        ];

    }
    public function messages(){

        return[
             'transaction_id.required' => 'El numero de transaccion es requerido ',
             'product_id.required' => 'El producto es requerido',
             'quantity.required' => 'La cantidad es requerida',
             'price_unit.required' => 'El precio es requerido'
        ];
    }

}
