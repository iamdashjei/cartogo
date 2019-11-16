<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehicle = Vehicle::all();
        return view('pages.admin.vehicles', compact('vehicle'));
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
            'platenumber'     => 'required|string',
            'lastkm_reading'     => 'required',
            'lastpassenger'     => 'required|string',
            'lasttime_out'     => 'required',
            'lasttotal_load'     => 'required',
            'brand'     => 'required|string',
            'model'     => 'required|string',
            'type'     => 'required|string',
            'year'     => 'required|string',
            'seat_no'     => 'required|string',
            'body_type'     => 'required|string',
            'engine'     => 'required|string',
            'fuel_type'     => 'required|string',
            'fuel_capacity'     => 'required',
            'net_weight'     => 'required',
            'net_capacity'     => 'required',
            'shipping_weight'     => 'required'
            
        ]);

       // error_log(json_encode($request->all()));
        if($validator->passes())
            {
               // error_log("Passed the validator");
                $vehicle = new Vehicle;
                $vehicle->platenumber = $request->platenumber;
                $vehicle->lastkm_reading = (int) $request->lastkm_reading;
                $vehicle->lastpassenger = $request->lastpassenger;
                $vehicle->lasttime_out = $request->lasttime_out;
                $vehicle->lasttotal_load = (int)$request->lasttotal_load;
                $vehicle->brand = $request->brand;
                $vehicle->model = $request->model;
                $vehicle->type = $request->type;
                $vehicle->year = $request->year;
                $vehicle->seat_no = $request->seat_no;
                $vehicle->body_type = $request->body_type;
                $vehicle->engine = $request->engine;
                $vehicle->fuel_type = $request->fuel_type;
                $vehicle->fuel_capacity = (int)$request->fuel_capacity;
                $vehicle->net_weight = floatval($request->net_weight);
                $vehicle->net_capacity = floatval($request->net_capacity);
                $vehicle->shipping_weight = floatval($request->shipping_weight);
                $vehicle->image = null;
                
              
                if($vehicle->save()){
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
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function update_vehicle_details(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'edit_platenumber'     => 'required|string',
            'edit_lastkm_reading'     => 'required',
            'edit_lastpassenger'     => 'required|string',
            'edit_lasttime_out'     => 'required',
            'edit_lasttotal_load'     => 'required',
            'edit_brand'     => 'required|string',
            'edit_model'     => 'required|string',
            'edit_type'     => 'required|string',
            'edit_year'     => 'required|string',
            'edit_seat_no'     => 'required|string',
            'edit_body_type'     => 'required|string',
            'edit_engine'     => 'required|string',
            'edit_fuel_type'     => 'required|string',
            'edit_fuel_capacity'     => 'required',
            'edit_net_weight'     => 'required',
            'edit_net_capacity'     => 'required',
            'edit_shipping_weight'     => 'required',
            //'image'     => 'required|string'
    
        ]);

        if($validator->passes())
        {
            $vehicle = Vehicle::find($request->vehicle_value);
            $vehicle->platenumber = $request->edit_platenumber;
            $vehicle->lastkm_reading = (int)$request->edit_lastkm_reading;
            $vehicle->lastpassenger = $request->edit_lastpassenger;
            $vehicle->lasttime_out = $request->edit_lasttime_out;
            $vehicle->lasttotal_load = (int)$request->edit_lasttotal_load;
            $vehicle->brand = $request->edit_brand;
            $vehicle->model = $request->edit_model;
            $vehicle->type = $request->edit_type;
            $vehicle->year = $request->edit_year;
            $vehicle->seat_no = $request->edit_seat_no;
            $vehicle->body_type = $request->edit_body_type;
            $vehicle->engine = $request->edit_engine;
            $vehicle->fuel_type = $request->edit_fuel_type;
            $vehicle->fuel_capacity = (int)$request->edit_fuel_capacity;
            $vehicle->net_weight = floatval($request->edit_net_weight);
            $vehicle->net_capacity = floatval($request->edit_net_capacity);
            $vehicle->shipping_weight = floatval($request->edit_shipping_weight);
            $vehicle->image = null;
        
       // $product->save();

        if($vehicle->save()){
            $message = ['success' => true];
        } else {
            $message = ['success' => false];
        }
        
        return response()->json($message);
    } 


        return response()->json($validator->errors());
    }

    public function get_vehicle_details(Request $request){
        $vehicle = DB::table('vehicles')
        ->select('vehicles.id', 'vehicles.platenumber', 'vehicles.lastkm_reading', 'vehicles.lastpassenger', 'vehicles.lasttime_out', 'vehicles.lasttotal_load',
          'vehicles.brand', 'vehicles.model', 'vehicles.type', 'vehicles.year',
          'vehicles.seat_no', 'vehicles.body_type', 'vehicles.engine', 'vehicles.fuel_type',
          'vehicles.fuel_capacity', 'vehicles.net_weight', 'vehicles.net_capacity', 'vehicles.shipping_weight')
        ->where('vehicles.id', $request->id)->get();
        return json_decode($vehicle);
    }

    public function get_all_vehicle(Request $request)
    {
        $vehicle = DB::table('vehicles')
        ->select('vehicles.id', 'vehicles.platenumber', 'vehicles.lastkm_reading', 'vehicles.lastpassenger', 'vehicles.lasttime_out', 'vehicles.lasttotal_load',
          'vehicles.brand', 'vehicles.model', 'vehicles.type', 'vehicles.year',
          'vehicles.seat_no', 'vehicles.body_type', 'vehicles.engine', 'vehicles.fuel_type',
          'vehicles.fuel_capacity', 'vehicles.net_weight', 'vehicles.net_capacity', 'vehicles.shipping_weight')
        ->get();
        return json_decode($vehicle);
    }
}
