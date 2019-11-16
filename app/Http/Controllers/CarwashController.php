<?php

namespace App\Http\Controllers;

use App\Carwash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarwashController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carwash = Carwash::all();
        return view('pages.admin.carwash', compact('carwash'));
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
            'customer'     => 'required|string',
            'latitude'     => 'required|string',
            'longitude'      => 'required|string',
            'address'      => 'required|string',
            'service'      => 'required|string',
            'notes'      => 'required|string',
            'amount'      => 'required',
            'payment_method'      => 'required|string'
        ]);

        if($validator->passes())
        {
            $carwash = new Carwash;
            $carwash->customer = $request->customer;
            $carwash->lat = $request->latitude;
            $carwash->lng = $request->longitude;
            $carwash->address = $request->address;
            $carwash->service = $request->service;
            $carwash->notes = $request->notes;
            $carwash->amount = $request->amount;
            $carwash->payment_method = $request->payment_method;
            

            if($carwash->save()){
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
     * @param  \App\Carwash  $carwash
     * @return \Illuminate\Http\Response
     */
    public function show(Carwash $carwash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carwash  $carwash
     * @return \Illuminate\Http\Response
     */
    public function edit(Carwash $carwash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carwash  $carwash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carwash $carwash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carwash  $carwash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carwash $carwash)
    {
        //
    }

    public function get_carwash_details(Request $request)
    {
        $carwash = DB::table('carwashes')
        ->select('carwashes.id', 'carwashes.address', 'carwashes.service', 'carwashes.lat', 'carwashes.lng', 'carwashes.amount', 'carwashes.payment_method', 'carwashes.notes')
        ->where('carwashes.id', $request->id)->get();
        return json_decode($carwash);
    }

    public function update_carwash_details(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'edit_customer'     => 'required|string',
            'edit_latitude'     => 'required|string',
            'edit_longitude'      => 'required|string',
            'edit_address'      => 'required|string',
            'edit_service'      => 'required|string',
            'edit_notes'      => 'required|string',
            'edit_amount'      => 'required',
            'edit_payment_method'      => 'required|string'
        ]);

        if($validator->passes())
        {
            $carwash = Carwash::find($request->id);
            $carwash->customer = $request->edit_customer;
            $carwash->lat = $request->edit_latitude;
            $carwash->lng = $request->edit_longitude;
            $carwash->address = $request->edit_address;
            $carwash->service = $request->edit_service;
            $carwash->amount = $request->edit_amount;
            $carwash->notes = $request->edit_notes;
            $carwash->payment_method = $request->edit_payment_method;
            

            if($carwash->save()){
                $message = ['success' => true];
            } else {
                $message = ['success' => false];
            }
            
            return response()->json($message);
        } 


      return response()->json($validator->errors());
    }

    public function get_all_carwash()
    {
        $carwash = DB::table('carwashes')
        ->select('carwashes.id', 'carwashes.address', 'carwashes.service', 'carwashes.lat', 'carwashes.lng', 'carwashes.amount', 'carwashes.payment_method', 'carwashes.notes')
        ->get();
        return json_decode($carwash);
    }
}
