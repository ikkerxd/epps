<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductControllere extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:product-list');
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
      $products= Product::select('products.id as id','C.name as nameCategory','products.name as nameProduct','products.descripcion',
                'products.price','products.unidad_medida','products.marca','products.image','products.stock')
        ->join('category as C','products.category_id','=','C.id')
        ->where('products.state','=',1)
        ->get();
        
        return view('products.index',compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::pluck('name','id');
  
        return view('products.create',compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request,Product $product)
    {
        
        $fields = $request->validated();
        
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name = $file->getClientOriginalName();
            

            $file -> move(public_path().'/images/',$name);
            
            $fields['image'] = $name;
            
            
        }
        

        $product=Product::create($fields);
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    
    {
        
       /* $category = DB::table('category')
        ->where('id',$product->category_id)
        ->first();*/

        $category=Category::select('category.name','category.id')
        ->where('category.id',$product->category_id)->first();
        
        
        return view('products.show', compact('product','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category=Category::pluck('name','id');
        
        
        return view('products.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        
       
        $fields = $request->validated();
        
        $file_path = public_path().'/images/'.$product->image;
        
            
        
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name = $file->getClientOriginalName();

            \File::delete($file_path);
        
            $file -> move(public_path().'/images/',$name);
            
            $fields['image'] = $name;
            
            
        }else{
            
            
            $fields['image'] = $product->image;
        }
        

        $product->update($fields);
        return redirect()->route('products.index')
                        ->with('success','Producto actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $file_path = public_path().'/images/'.$product->image;
        \File::delete($file_path);
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Producto '.$product->name .' Eliminado Correctamente.');
    }
}
