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
            
            'nro_transaction' => 'required|numeric',
            'nro_guide' => 'required|numeric',
            'date' => 'required|date',
            'total' => 'required',
            'process' =>'nullable'    
            
            
        ];
    }
    public function messages(){

        return[
            
            'nro_transaction.required' =>'El nro de transaccion es requerido',
            'nro_transaction.numeric' =>'El nro de transaccion debe ser numerico',
            'nro_guide.required' =>'El nro de guia es requerido',
            'nro_guide.numeric' =>'El nro de guia debe ser numerico',
            'date.required' =>'Es necesario la fecha',
            'date.date'=>'Introdusca el formato de fecha',
            'total.required'=>'El total es requerido',
            
            
        ];
    }
}
