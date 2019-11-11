<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OutletProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outlet = Outlet::all();
        return view('pages.admin.outlet_profile', compact('outlet'));
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
        $validator = Validator::make($request->all(),[
            'store_name'     => 'required|string',
            'showcase'     => 'required|string',
            'cperson'     => 'required|string',
            'cnumber'     => 'required|string',
            'address'     => 'required|string',
            'size'      => 'required|string',
            'type'         => 'required',
            'account'      => 'required | string'
        ]);

        if($validator->passes())
            {
                $outlet = new Outlet;
                $outlet->store_name = $request->store_name;
                $outlet->type = $request->type;
                $outlet->account = $request->account;
                $outlet->address = $request->address;
                $outlet->showcase_no = $request->showcase;
                $outlet->size = $request->size;
                $outlet->contact_person = $request->cperson;
                $outlet->contact_no = $request->cnumber;
                $outlet->sale_id = 0;
               // $product->save();

                if($outlet->save()){
                    $message = ['success' => true];
                } else {
                    $message = ['success' => false];
                }
                
                return response()->json($message);
            } 


        return response()->json($validator->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update_outlet_details(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'edit_store_name'     => 'required|string',
            'edit_showcase'     => 'required|string',
            'edit_cperson'     => 'required|string',
            'edit_cnumber'     => 'required|string',
            'edit_address'     => 'required|string',
            'edit_size'      => 'required|string',
            'edit_type'         => 'required',
            'edit_account'      => 'required | string'
        ]);

        if($validator->passes())
            {
                $outlet = Outlet::find($request->outlet_value);
                $outlet->store_name = $request->edit_store_name;
                $outlet->type = $request->edit_type;
                $outlet->account = $request->edit_account;
                $outlet->address = $request->edit_address;
                $outlet->showcase_no = $request->edit_showcase;
                $outlet->size = $request->edit_size;
                $outlet->contact_person = $request->edit_cperson;
                $outlet->contact_no = $request->edit_cnumber;
                $outlet->sale_id = 0;
                // $product->save();

                if($outlet->save()){
                    $message = ['success' => true];
                } else {
                    $message = ['success' => false];
                }
                
                return response()->json($message);
            } 


        return response()->json($validator->errors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        //
    }

    public function get_outlet_details(Request $request){
        $outlet = DB::table('outletprofiles')
        ->select('outletprofiles.id', 'outletprofiles.store_name',
         'outletprofiles.type', 'outletprofiles.account', 'outletprofiles.address', 'outletprofiles.showcase_no', 'outletprofiles.size', 'outletprofiles.contact_person', 'outletprofiles.contact_no')
        ->where('outletprofiles.id', $request->id)->get();
        return json_decode($outlet);
    }
}
