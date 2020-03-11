<?php

namespace App\Http\Controllers;
use App\Notavailable;
use App\Transaction;

use Illuminate\Http\Request;

class NotAvailableController extends Controller
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
        $notavailable =Notavailable::select('not_availables.id','tr.nro_transaction as nro_transaction','not_availables.name','not_availables.quantity','not_availables.state')
                            ->join('transactions as tr','not_availables.transaction_id','=','tr.id')
                            ->where('not_availables.state','=',1)
                            ->get();
    
            return view('notavailables.index',compact('notavailable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $transactions = Transaction::pluck('nro_transaction','id');
       
        


        return view('notavailables.create',compact('transactions'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Notavailable $notavailable)
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
  
        $notavailable::create($fields);
 
        return redirect()->route('notavailables.index')
        ->with('success', 'El producto especifico "'. $request->name .'" con la cantidad '. $request->quantity.' fue registrado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notavailable $notavailable)
    {
        
        $transactions = Transaction::pluck('nro_transaction','id')
        ->where('id',$notavailable->transaction_id);
        
        return view('notavailables.index',compact('notavailable','transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notavailable $notavailable)
    {
        
        
        $transactions = Transaction::pluck('nro_transaction','id');
        
        return view('notavailables.edit',compact('notavailable','transactions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notavailable $notavailable)
    {
        $fields= request()->validate([
            'name' =>'required',
            'quantity'=>'required',
            'transaction_id' => 'required'
        ],
            [
                'name.required' =>'El campo name es obligatorio',
                'quantity.required' =>'El campo quantity es obligatorio',
                'transaction.required' => 'Campo transaccion obligatorio'
            ]);
           
         
            
        $notavailable::where('state','=',1)->update($fields);

        
        return redirect()->route('notavailables.index')
        ->with('success','El producto: '. $notavailable->name .' con la cantidad '. $notavailable->quantity .' actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notavailable $notavailable)
    {
        
        $transaction=Transaction::
        where('id','=',$notavailable->transaction_id)->first();
        $notavailable::where('id','=',$notavailable->id)->update(['state'=> '0']);
       

        return redirect()->back()->with('danger','El producto solicitado con el numero '.$transaction->nro_transaction .' en la fecha '. $transaction->date .' fue Eliminada con exito');
    }
}
