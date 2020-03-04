<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'descripcion' =>'required',
            'color'=>'required',
            'contenido'=>'required',
            'price'=>'required',
            'unidad_medida'=>'required',
            'category_id'=>'required'
            
        ];
    }
    
    public function messages(){
        
        return [
            'name.required' => 'El nombre es requerido',
            'descripcion.required' =>'El producto necesita una descripción',
            'color.required'=>'El color es requerido',
            'contenido.required'=>'El contenido es requerido',
            'price.required'=>'Ingrese un precio',
            'category_id.required'=>'ingrese una categoria',
            'unidad_medida.required'=>'Es necesario una unidad_medida',
        ];
    }
    
}
