<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
      $products= DB::table('products as P')
        ->select('P.id as id','C.name as nameCategory','P.name as nameProduct','P.descripcion',
                'P.price','P.unidad_medida','P.marca')
        ->join('category as C','P.category_id','=','C.id')
        ->where('P.state','=',1)
        
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
        $product=Product::create($fields);
        
        
        if($request->file('file')){
            $path = Storage::disk('public')->put('image',$fields->file('file'));
            $product =fill(['file'=>asset($path)])->save();
        }
        
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
        return view('companies.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $validate, Product $product)
    {
        $fields = $validate->validated();
        Product::update($fields->all());
        if($fields->file('file')){
            $path = Storage::disk('public')->put('image',$fields->file('file'));
            $post=fill(['file'=>asset($path)])->save();
        }
        
            
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
