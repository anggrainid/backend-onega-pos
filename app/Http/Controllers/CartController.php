<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::all();
        return response()->json([
            'status' => 'success',
            'data' => $cart,
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
            'customer_id'=> 'required',
            'cart_date'=> 'required',
            'subtotal'=> 'required',
            'discount'=> 'required',
            'tax'=> 'required',
            'total_price'=> 'required',
            'notes'=> 'required',
            
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
            'status' => 'data added successfully',
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

    // public function invoice($no_order)
    // {
    //     $order = Order::with('productOrder')->where('no_order', $no_order)->first();

    //     return view ('kasir.invoice', compact('order'));
    // }
}
