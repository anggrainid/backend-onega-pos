<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Cart;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function make_invoice(Request $request)
    {
        $newInvoice = Invoice::create([
            'customer_id'=>$request->customer_id,
            'subtotal'=>$request->subtotal,
            'discount'=>$request->discount,
            'tax'=>$request->tax,
            'total_price'=>$request->total_price,
            'notes'=>$request->notes,
        ]);
        $newInvoiceItems = [];
        foreach($request->items as $item){
            $newInvoiceItem = InvoiceItem::create([
                'invoice_id' => $newInvoice->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['subtotal'],
            ]);
            $newInvoiceItems[] = $newInvoiceItem;
        }

        return response()->json([
            'status' => 'success',
            'data' =>  $newInvoice,
        ]);
       
    }
    public function byInvoiceId($id)
    {
        //
        $invoice = Invoice::find($id);
        $invoice_invoice_items = Invoice::with('invoice_items')
            ->where('id', $invoice->id)->get();
        //$cartItem = CartItem::all();
        return response()->json([
            'status' => 'success',
            'data' => $invoice_invoice_items, //$cart_items->cart_items->get(),
        ]);


       
    }
    
    public function index()
    {
        //
        $pagination = 15;
        $invoices = Invoice::with('invoice_items')->paginate($pagination);
        return response()->json([
            'status' => 'success',
            'data' => $invoices,
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

}
