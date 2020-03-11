<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Http\Requests\CreateTransactionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TransactionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:transaction-list');
         $this->middleware('permission:transaction-create', ['only' => ['create','store']]);
         $this->middleware('permission:transaction-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:transaction-delete', ['only' => ['destroy']]);
    }

    

    public function index()
    {
        $user =Auth::user();
        
        $transaction=Transaction::select('transactions.id as id','transactions.type','transactions.date'
                            ,'transactions.nro_transaction','transactions.nro_guide','transactions.total','transactions.process')
                            
                            ->where('transactions.state','=','1')
                            ->get();

            return view('transactions.index',compact('transaction','user'));
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =Auth::user()->pluck('name','id');
         
        return view('transactions.create',compact('user'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTransactionRequest $request, Transaction $transaction)
    {
        $user =Auth::user();
        
       
        $fields = $request->validated();
        $fields['user_id']=$user->id;
        

        $transaction::create($fields);
        
        return redirect()->route('transactions.index')
                        ->with('success','Transaccion con el numero'. $transaction->nro_transaction .' en la fecha '. $transaction->date .' Agregada Correctamente.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $user =Auth::user();
        
        return view('transactions.show', compact('transaction','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Transaction $transaction)
    {
        $user =Auth::user();
        
        
        return view('transactions.edit',compact('transaction','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTransactionRequest $request,Transaction $transaction)
    {
        
        $fields = $request->validated();
       // ->whereor('process','=','pending')
       
        $transaction::where('process','=','request')->where('id','=',$transaction->id)->update($fields);
        if($transaction->process <>'request' and $transaction->process <>'pending' ){
            return redirect()->route('transactions.index')
            ->with('danger','Transaccion con el numero'. $transaction->nro_transaction . ' no  ah sido actualizada. '.' El proceso ya esta aprovado');
        }
        return redirect()->route('transactions.index')
                        ->with('success','Transaccion con el numero'. $transaction->nro_transaction .' en la fecha '. $transaction->date .' actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        
        Transaction::where('id','=',$transaction->id)->update(['state'=> '0']);

        return redirect()->back()->with('danger','La transaccion con el numero '.$transaction->nro_transaction .' en la fecha '. $transaction->date .' fue Eliminada con exito');
    }
}
