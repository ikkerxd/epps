<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Not_available;

class Not_AvailableController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list');
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $not_available =Not_available::select('not_availables.id','tr.nro_transaction as nro_transaction','not_availables.name','not_availables.quantity','not_availables.state')
                            ->join('transactions as tr','not_availables.transaction_id','=','tr.id')
                            ->where('not_availables.state','=',1)
                            ->get();
    
            return view('not_availables.index',compact('not_available'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $transactions = Transaction::pluck('nro_transaction','id')
        ->where('id',$request->transaction_id);
        


        return view('not_availables.create',compact('transactions'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Not_available $not_available)
    {
      
        $fields= request()->validate([
            'name' =>'required',
            'transaction_id' =>'required',
            'quantity'=>'required',
        ],
            [
                'name.required' =>'El campo name es obligatorio',
                'transaction_id.required' =>'el campo transaccion es requerido',
                'quantity.required' =>'El campo quantity es obligatorio'
            ]);
            //poder modificar
            //$fields['state']=2;   
  
        $not_available::create($fields);
 
        return redirect()->route('not_availables.index')
        ->with('success', 'El producto especifico "'. $request->name .'" con la cantidad '. $request->quantity.' fue registrado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Not_available $not_available)
    {
        
        $transactions = Transaction::pluck('nro_transaction','id')
        ->where('id',$request->transaction_id);
        return view('transactions.index',compact('not_available','transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Not_available $not_available)
    {
        
        $transactions = Transaction::pluck('nro_transaction','id')
        ->where('id',$request->transaction_id);
        return view('transactions.index',compact('not_available','transactions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Not_available $not_available)
    {
        $this->validate($request,[
            'name' =>'required',
            'quantity'=>'required',
            
        ],
            [
                'name.required' =>'El campo name es obligatorio',
                'quantity.required' =>'El campo quantity es obligatorio'
            ]);
        $not_available::update($fields);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Not_available $not_available)
    {
        $transaction=Transaction::all()
        ->where('id','=',$not_available->transaction_id);
        Not_available::where('id','=',$not_available->id)->update(['state'=> '0']);

        return redirect()->back()->with('danger','El producto solicitado con el numero '.$transaction->nro_transaction .' en la fecha '. $transaction->date .' fue Eliminada con exito');
    }
}
