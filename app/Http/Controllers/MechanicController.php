<?php

namespace App\Http\Controllers;

use App\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mechanic = Mechanic::all();
        return view('pages.admin.mechanic', compact('mechanic'));
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
            'name'     => 'required|string',
            'latitude'     => 'required|string',
            'longitude'      => 'required|string',
            'address'      => 'required|string',
            'service'      => 'required|string',
            'notes'      => 'required|string',
            'specialty'      => 'required|string'
        ]);

        if($validator->passes())
        {
            $mechanic = new Mechanic;
            $mechanic->name = $request->name;
            $mechanic->lat = $request->latitude;
            $mechanic->lng = $request->longitude;
            $mechanic->address = $request->address;
            $mechanic->service = $request->service;
            $mechanic->specialty = $request->specialty;
            $mechanic->notes = $request->notes;
            

            if($mechanic->save()){
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
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        //
    }

    public function get_mechanic_details(Request $request)
    {
        $mechanic = DB::table('mechanics')
        ->select('mechanics.id', 'mechanics.name', 'mechanics.address', 'mechanics.service', 'mechanics.lat', 'mechanics.lng',  'mechanics.specialty', 'mechanics.notes')
        ->where('mechanics.id', $request->id)->get();
        return json_decode($mechanic);
    }

    public function update_mechanic_details(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'edit_name'     => 'required|string',
            'edit_latitude'     => 'required|string',
            'edit_longitude'      => 'required|string',
            'edit_address'      => 'required|string',
            'edit_service'      => 'required|string',
            'edit_notes'      => 'required|string',
            'edit_specialty'      => 'required|string'
        ]);

        if($validator->passes())
        {
            $mechanic = Mechanic::find($request->id);
            $mechanic->name = $request->edit_name;
            $mechanic->lat = $request->edit_latitude;
            $mechanic->lng = $request->edit_longitude;
            $mechanic->address = $request->edit_address;
            $mechanic->service = $request->edit_service;
            $mechanic->specialty = $request->edit_specialty;
            $mechanic->notes = $request->edit_notes;
            

            if($mechanic->save()){
                $message = ['success' => true];
            } else {
                $message = ['success' => false];
            }
            
            return response()->json($message);
        } 


      return response()->json($validator->errors());
    }
}
