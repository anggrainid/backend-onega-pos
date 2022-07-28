<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {
        $invoiceItem = InvoiceItem::all();
        return response()->json([
            'status' => 'success',
            'data' => $invoiceItem
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
        $invoiceItem = InvoiceItem::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $invoiceItem
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
        $invoiceItem = InvoiceItem::with('invoice', 'product')->find($id);
        return response()->json([
            'status' => 'success',
            'data' => $invoiceItem
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
        $invoiceItem = InvoiceItem::find($id);
        $invoiceItem->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $invoiceItem
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
        $invoiceItem = InvoiceItem::find($id);
        $invoiceItem->delete();
        return response()->json([
            'status' => 'success',
            'data' => $invoiceItem
        ]);
    }

    public function byInvoice($id)
    {
        $invoice = Invoice::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $invoice ->invoice_items,
        ]);
    }
}
