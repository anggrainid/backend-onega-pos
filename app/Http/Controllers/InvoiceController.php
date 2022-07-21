<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Cart;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoice = Invoice::all();
        return response()->json([
            'status' => 'success',
            'data' => $invoice,
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


        $invoice = Invoice::create($request->all());

        return response()->json([
            'status' => 'data added successfully',
            'data' => $invoice,
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
        //
        $invoice = Invoice::find($id);
        return response()->json([
            'status' => 'data retrieved successfully',
            'data' => $invoice,
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
        $invoice = Invoice::find($id);
        $invoice = update($request->all());

        return response()->json([
            'status' => 'data updated successfully',
            'data' => $invoice,
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
        $invoice = Invoice::find($id);
        $invoice->delete();

        return response()->json([
            'status' => 'data deleted successuflly',
            'data' => null,
        ]);
    }

    public function invoice($id)
    {
        $cart = Cart::find($id);
        
        // $this->validate($request,[

        //     //
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
        


        //$invoice = update($request->all());
        //$invoice = Invoice::create($request->all());

        $cart->delete();

        return response()->json([
            'status' => 'data added successfully',
            'data' => $invoice,
        ]);
        
    }
}
