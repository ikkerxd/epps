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
            'category_id'=>'required',
            'descripcion' =>'required',
            'contenido'=>'required',
            'unidad_medida'=>'required',
            'marca'=>'required',
            'color'=>'required',
            'ficha_tecnica'=>'required',
            'price'=>'required',
            'image'=>'present',
            //'image'=>'file|image|max:5000',
        ];
    }
    
    public function messages(){
        
        return [
            'name.required' => 'El nombre es requerido',
            'descripcion.required' =>'El producto necesita una descripción',
            'ficha_tecnica.required' =>'Ficha Tecnica necesaria',
            'color.required'=>'El color es requerido',
            'contenido.required'=>'El contenido es requerido',
            'price.required'=>'Ingrese un precio',
            'category_id.required'=>'ingrese una categoria',
            'unidad_medida.required'=>'Es necesario una unidad_medida',
            'marca.required' =>'Es necesario la marca',
        ];
    }
    
}
