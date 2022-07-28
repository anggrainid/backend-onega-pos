<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Invoce;
use App\Models\InvoiceItem;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function byCart($id)
    {
        //
        $cart = Cart::find($id);
        //$cartItem = CartItem::all();
        return response()->json([
            'status' => 'success',
            'data' => $cart->cart_items, //$cart_items->cart_items->get(),
        ]);

       
    }
    public function index()
    {
        //
        //$cart = Cart::all();
        $cartItem = CartItem::with('product')->get();
        return response()->json([
            'status' => 'success',
            'data' => $cartItem
            //'cartItem' => $cartItem,

        ]);
    }
    

    public function getByCartId($id) {
        $cartItem = CartItem::with('product')->where('cart_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $cartItem
        ]);
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
        $this->validate($request,[

            //
        ]);
        $cartItem = CartItem::create($request->all());

        return response()->json([
            'status' => 'data added successfully',
            'data' => $cartItem,
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
        $cartItem = CartItem::find($id);
        return response()->json([
            'status' => 'data added successfully',
            'data' => $cartItem,
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
        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($request->all());

        $cartItem->update();
        return response()->json([
            'status' => 'data updated successuflly',
            'data' => $cartItem,
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
        $cartItem = CartItem::find($id);
        $cartItem->delete();

        return response()->json([
            'status' => 'data deleted successuflly',
            'data' => null,
        ]);
    }

    public function get_invoice_item($id)
    {
        $cartItem = CartItem::find($id);
        
        // $this->validate($request,[

        //     //
        // ]);
        $invoiceItem = new InvoiceItem();
        $invoiceItem->invoice_id=$cartItem->cart_id;
        $invoiceItem->product_id=$cartItem->product_id;
        $invoiceItem->discount=$cartItem->discount;
        $invoiceItem->quantity=$cartItem->quantity;
        $invoiceItem->price=$cartItem->price;
        $invoiceItem->save();
        


        //$invoice = update($request->all());
        //$invoice = Invoice::create($request->all());

        $cartItem->delete();

        return response()->json([
            'status' => 'get invoice item successfully',
            'data' => $invoiceItem,
        ]);
    }
}
