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
            'description' =>'required',
            'content'=>'required',
            'metric'=>'required',
            'brand'=>'required',
            'color'=>'required',
            'datasheet'=>'required',
            'price'=>'required',
            'image'=>'present',
            //'image'=>'file|image|max:5000',
        ];
    }
    
    public function messages(){
        
        return [
            'name.required' => 'El nombre es requerido',
            'description.required' =>'El producto necesita una descripción',
            'datasheet.required' =>'Ficha Tecnica necesaria',
            'color.required'=>'El color es requerido',
            'content.required'=>'El contenido es requerido',
            'price.required'=>'Ingrese un precio',
            'category_id.required'=>'ingrese una categoria',
            'metric.required'=>'Es necesario una unidad_medida',
            'brand.required' =>'Es necesario la marca',
        ];
    }
    
}
