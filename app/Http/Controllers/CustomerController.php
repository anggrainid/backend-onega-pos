<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function getCustomer(){
        $cust = Customer::all();
        return response()->json([
            'status' => 'success',
            'data' => $cust,
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
        $this->validate($request,[

            //
        ]);


        $cust = new Customer;
        $cust->code = $request->code;
        $cust->name= $request->name;
        $cust->address = $request->address;
        $cust->phone_num= $request->phone_num;

        $cust->save();
        return response()->json([
            'status' => 'data added successfully',
            'data' => $cust,
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//menangkap id yang dikirimkan dari form, yaitu ketika tombol edit di klik
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
        $cust = Customer::find($id);
        $cust->code = $request->code;
        $cust->name= $request->name;
        $cust->address = $request->address;
        $cust->phone_num= $request->phone_num;

        $cust->save();
        return response()->json([
            'status' => 'data updated successuflly',
            'data' => $cust,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //menangkap id yang dikirimkan dari form, yaitu ketika tombol Hapus di klik    
    {
        $cust = Customer::find($id); 
        $cust->delete();

        return response()->json([
            'status' => 'data deleted successuflly',
            'data' => $cust,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $cust = Cust::where('code', 'like', "%".$search."%")->
        orwhere('name', 'like', "%".$search."%")->orwhere('id', 'like', "%".$search."%");
 
        return response()->json($cust);
    }

}
