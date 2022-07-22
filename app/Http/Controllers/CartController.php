<?php

namespace App\Http\Controllers;

//use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Validation\Rule;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function byCartId($id)
    {
        //
        $cart = Cart::find($id);
        $cart_cart_items = Cart::with('cart_items')
            ->where('id', $cart->id)->get();
        //$cartItem = CartItem::all();
        return response()->json([
            'status' => 'success',
            'data' => $cart_cart_items, //$cart_items->cart_items->get(),
        ]);

       
    }

    public function index()
    {
        $carts = Cart::with('cart_items')->get();
        // $cartItems = Cart::with('cart_items')->get();
        // $cart_items = CartItem::get()->cart_items();
        return response()->json([
            'status' => 'success',
            'data' => $carts, //$cart_items->cart_items->get(),
        ]);
        // $cart = Cart::where('id',$id)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $this->validate($request,[

        //     ''
        // ]);
        $rules = [
            'customer_id'=> 'required|integer',
            'cart_date'=> 'required|date_format',
            'subtotal'=> 'required|numeric',
            'discount'=> 'required|numeric',
            'tax'=> 'required|numeric',
            'total_price'=> 'required|numeric',
            'notes'=> 'required|string',
            
        ];
        $validator = Validator::make($request->all(),$rules);


        $cart = Cart::create($request->all());

        return response()->json([
            'status' => 'Cart added successfully',
            'data' => $cart,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        return response()->json([
            'status' => 'data retrieved successfully',
            'data' => $cart,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());

        $cart->update();
        return response()->json([
            'status' => 'data updated successuflly',
            'data' => $cart,
        ]);
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
        //$id->delete();
        $cart = Cart::find($id);
        $cart->delete();

        return response()->json([
            'status' => 'data deleted successuflly',
            'data' => null,
        ]);
    }

    public function get_invoice($id)
    {
        $cart = Cart::find($id);
        $cartItems = CartItem::where('cart_id', $id)->get()->all();
        //dd($cartItems);
        //$cartItems = $cart->cart_items->first();
        
        // $this->validate($request,[

        // ]);
        $invoice = new Invoice();    
        $invoice->customer_id=$cart->customer_id;
        $invoice->cart_date=$cart->cart_date;
        $invoice->subtotal=$cart->subtotal;
        $invoice->discount=$cart->discount;
        $invoice->tax=$cart->tax;
        $invoice->total_price=$cart->total_price;
        $invoice->notes=$cart->notes;
        $invoice->save();

        foreach ($cartItems as $cartItem){

            $invoiceItem = new InvoiceItem();
            $invoiceItem->invoice_id=$cartItem->cart_id;
            $invoiceItem->product_id=$cartItem->product_id;
            $invoiceItem->discount=$cartItem->discount;
            $invoiceItem->quantity=$cartItem->quantity;
            $invoiceItem->price=$cartItem->price;
            $invoiceItem->save();

            $cartItem->delete();

        }

        // $invoice_invoice_items = Invoice::with('invoice_items')
        //     ->where('id', $invoice->id)->get();
        return response()->json([
            'status' => 'get invoice successfully',
            // 'data' => $invoice_invoice_items,
            //'cart' => $invoice,
        ]);
        
    }
    
    

    // public function invoice($no_order)
    // {
    //     $order = Order::with('productOrder')->where('no_order', $no_order)->first();

    //     return view ('kasir.invoice', compact('order'));
    // }
}
