<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Product;
use App\Detail;

class DetailsController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:details-list');
         $this->middleware('permission:details-create', ['only' => ['create','store']]);
         $this->middleware('permission:details-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:details-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $detail=Detail::select('details.id','t.nro_transaction as nro_transaction','p.name as name','details.quantity','details.price_unit')
                           ->join('transactions as t','details.transaction_id','=','t.id')
                           ->join('products as p','details.product_id','=','p.id')
                           ->where('details.state','=',1)
                           ->get();

        return view('details.index',compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaction=Transaction::pluck('nro_transaction','id');
        $product= Product::pluck('name','id');

        return view('details.create',compact('transaction','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDetailRequest $request, Detail $detail)
    {

        $fields=$request->validated();
        $transaction =Transaction::where('id',$request->transaction_id)
        ->first();
        $product =Product::where('id',$request->product_id)
        ->first();

        $detail::create($fields);

        return redirect()->route('details.index')
        ->with('success','El detalle con el numero'. $transaction->nro_transaction .' en la fecha '. $transaction->date .' Agregada Correctamente.');  


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        $transaction =Transaction::pluck('nro_transaction','name');
        $product =Product::pluck('name','id');

        return view('details.show', compact('transaction','product','detail'));
    }

   

    public function edit(Detail $detail)
    {
        $transaction =Transaction::pluck('nro_transaction','name');
        $product =Product::pluck('name','id');

        return view('details.edit', compact('transaction','product','detail'));
    }


    public function update(CreateDetailRequest $request, Detail $detail)
    {
        $fields=$request->validated();
        $fields=$request->validated();
        $transaction =Transaction::where('id',$request->transaction_id)
        ->first();

        $detail::where('state','=',1)->update($fields);

        return redirect()->route('details.index')
                        ->with('success','El detalle con el numero de transacción: '. $transaction->nro_transaction .' en la fecha '. $transaction->date .' actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        Detail::where('id','=',$transaction->id)->update(['state'=> '0']);

        return redirect()->back()->with('danger','El detalle con el numero de transacción: '.$transaction->nro_transaction .' en la fecha '. $transaction->date .' fue Eliminada con exito');
    }
}
