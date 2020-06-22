<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Category;
use App\Product;
use App\Notavailable;
use App\Detail;
use Carbon\Carbon;
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

    

    public function index($description)
    {
        
        $products= Product::select('products.id as id','C.name as nameCategory','products.name as nameProduct','products.description',
        'products.price','products.metric','products.brand','products.image','products.stock')
            ->join('category as C','products.category_id','=','C.id')
            ->where('products.description','=',$description)
            //->where('products.state','=',1)
            ->paginate(20);
        
        return view('transactions.listado',compact('products'));
    
        
    }
    public function index2($name)
    {
        
        $products= Product::select('products.id as id','C.name as nameCategory','products.name as nameProduct','products.description',
        'products.price','products.metric','products.brand','products.image','products.stock')
            ->join('category as C','products.category_id','=','C.id')
            ->where('products.name','=',$name)
            //->where('products.state','=',1)
            ->paginate(20);
        
        return view('transactions.listado',compact('products'));
    
        
    }
    public function list(){
        $transactions=Transaction::select('transactions.id as id','us.name as nameuser','product.name as productname','cat.name as namecategory','product.image as image','transactions.date as date','transactions.process as proccess')
        ->join('details as detail','detail.transaction_id','transactions.id')
        ->join('products as product','product.id','detail.product_id')
        ->join('category as cat','product.category_id','cat.id')
        ->join('users as us','us.id','transactions.user_id')
        ->paginate(10);
        
        return view('transactions.index',compact('transactions'));
    }

    
    //Solicitar Cotizacion de un pedido
    public function quote($id)
    {
        
        $transactions=Transaction::select('transactions.id as id','us.name as nameuser','us.email as email','transactions.date','product.id as idproduct','detail.quantity as quantity',
        'product.name as productname',)
        ->join('details as detail','detail.transaction_id','transactions.id')
        ->join('products as product','product.id','detail.product_id')
        ->join('users as us','us.id','transactions.user_id')
        ->where('us.id','=',$id)
        ->get();
        $transaction=Transaction::select('transactions.id as id','us.name as nameuser','us.email as email','transactions.date','product.id as idproduct','detail.quantity as quantity',
        'product.name as productname',)
        ->join('details as detail','detail.transaction_id','transactions.id')
        ->join('products as product','product.id','detail.product_id')
        ->join('users as us','us.id','transactions.user_id')
        ->where('us.id','=',$id)
        ->first();
        $notavailables=Notavailable::select('not_availables.name as notname','not_availables.quantity as notquantity')
        ->get();
        return view('transactions.quote',compact('transactions','transaction','notavailables'));
        
    }
    public function storequote(CreateTransactionRequest $request, Transaction $transaction)
    {
        
        
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
        //ingresando datos a la tabla transaccion
        $transaction->user_id= $fields['user_id'];
        $transaction->date= Carbon::now();
        $transaction->total=$fields['quantity'];
        $transaction->save();
        
        $details= new Detail;
        //ingresando datos a la tabla details
        $details->transaction_id=$transaction->id;
        $details->product_id=$fields['productid'];
        $details->quantity=$fields['quantity'];
        $details->price_unit=$fields['price'];
        
        $details->save();

       
        $product=Product::select('products.name as nameproduct','products.image','products.id as productid','products.price as price',
        'products.description as description')
        ->join('details as detail','detail.product_id','products.id')
        ->join('transactions as transaction','transaction.id','detail.transaction_id')
        ->where('transaction.id','=',$transaction->id)
        ->first();
        
        $transact=Transaction::select('transactions.id as id')
        ->where('transactions.id','=',$transaction->id)
        ->first();
        
        return Redirect()->back()->with('success','Cotizacion Solicitada con el numero'. $transaction->id .' en la fecha '. $transaction->date .' Agregada Correctamente.')->with(compact('product'));
                //->with('success','Cotizacion Solicitada con el numero'. $transaction->id .' en la fecha '. $transaction->date .' Agregada Correctamente.');  
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
