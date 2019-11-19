<?php

namespace App\Http\Controllers;

use App\Towing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $towing = Towing::all();
        return view('pages.admin.towing', compact('towing'));
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
            'company'     => 'required|string',
            'latitude'     => 'required|string',
            'longitude'      => 'required|string',
            'address'      => 'required|string',
            'amount'      => 'required',
            'notes'      => 'required|string',
            'branch'      => 'required|string',
            'mobile_no'      => 'required|string'
        ]);

        if($validator->passes())
        {
            $towing = new Towing;
            $towing->company = $request->company;
            $towing->lat = $request->latitude;
            $towing->lng = $request->longitude;
            $towing->address = $request->address;
            $towing->branch = $request->branch;
            $towing->amount = $request->amount;
            $towing->notes = $request->notes;
            $towing->mobile_no = $request->mobile_no;

            if($towing->save()){
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
     * @param  \App\Towing  $towing
     * @return \Illuminate\Http\Response
     */
    public function show(Towing $towing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Towing  $towing
     * @return \Illuminate\Http\Response
     */
    public function edit(Towing $towing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Towing  $towing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Towing $towing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Towing  $towing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Towing $towing)
    {
        //
    }

    public function get_towing_details(Request $request)
    {
        $towing = DB::table('towings')
        ->select('towings.id', 'towings.company', 'towings.address', 'towings.amount', 'towings.lat', 'towings.lng',  'towings.branch', 'towings.notes', 'towings.mobile_no')
        ->where('towings.id', $request->id)->get();
        return json_decode($towing);
    }

    public function update_towing_details(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'edit_company'     => 'required|string',
            'edit_latitude'     => 'required|string',
            'edit_longitude'      => 'required|string',
            'edit_address'      => 'required|string',
            'edit_amount'      => 'required',
            'edit_notes'      => 'required|string',
            'edit_branch'      => 'required|string',
            'edit_mobile_no'      => 'required|string'
        ]);

        if($validator->passes())
        {
            $towing = Towing::find($request->id);
            $towing->company = $request->edit_company;
            $towing->lat = $request->edit_latitude;
            $towing->lng = $request->edit_longitude;
            $towing->address = $request->edit_address;
            $towing->branch = $request->edit_branch;
            $towing->amount = $request->edit_amount;
            $towing->notes = $request->edit_notes;
            $towing->mobile_no = $request->edit_mobile_no;
            

            if($towing->save()){
                $message = ['success' => true];
            } else {
                $message = ['success' => false];
            }
            
            return response()->json($message);
        } 


      return response()->json($validator->errors());
    }

    public function get_all_towing(Request $request)
    {
        $towing = DB::table('towings')
        ->select('towings.id', 'towings.company', 'towings.address', 'towings.amount', 'towings.lat', 'towings.lng',  'towings.branch', 'towings.notes', 'towings.mobile_no')
        ->get();
        return json_decode($towing);
    }
}
