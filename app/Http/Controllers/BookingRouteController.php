<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Booking;
use App\Models\User;
use App\Outlet;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookingRouteController extends Controller
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

    public function index()
    {
        $outlets = Outlet::all();
        $booking = Booking::all();
        $users = User::all();
        return view('pages.admin.booking_route', compact('booking', 'users', 'outlets'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'store_name'     => 'required|string',
            'description'     => 'required|string',
            'latitude'      => 'required|string',
            'longitude'      => 'required|string',
            'address'      => 'required|string',
            'schedule'      => 'required|string',
            'user'      => 'required',
            'route_date'      => 'required'
        ]);

        if($validator->passes())
        {
            $booking = new Booking;
            $booking->store_name = $request->store_name;
            $booking->description = $request->description;
            $booking->address = $request->address;
            $booking->lat = $request->latitude;
            $booking->lng = $request->longitude;
            $booking->scheduled = $request->schedule;
            $booking->user_id = $request->user;
            $booking->route_date = $request->route_date;

            if($booking->save()){
                $message = ['success' => true];
            } else {
                $message = ['success' => false];
            }
            
            return response()->json($message);
        } 


    return response()->json($validator->errors());

    }

    public function get_booking_details(Request $request)
    {
        $booking = DB::table('booking_routes')
        ->leftJoin('users', 'booking_routes.user_id', '=', 'users.id')
        ->select('booking_routes.id','booking_routes.store_name', 'booking_routes.description', 
        'booking_routes.address', 'booking_routes.lat', 'booking_routes.lng', 'booking_routes.scheduled',
         'booking_routes.user_id', 'booking_routes.route_date', 'users.name' )
        ->where('booking_routes.id', $request->id)->get();
        return json_decode($booking);
    }

    public function update_booking_details(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'edit_store_name'     => 'required|string',
            'edit_description'     => 'required|string',
            'edit_latitude'      => 'required|string',
            'edit_longitude'      => 'required|string',
            'edit_address'      => 'required|string',
            'edit_schedule'      => 'required|string',
            'edit_user'      => 'required',
            'edit_route_date'      => 'required'
        ]);

        if($validator->passes())
        {
            $booking = Booking::find($request->booking_value);
            $booking->store_name = $request->edit_store_name;
            $booking->description = $request->edit_description;
            $booking->address = $request->edit_address;
            $booking->lat = $request->edit_latitude;
            $booking->lng = $request->edit_longitude;
            $booking->scheduled = $request->edit_schedule;
            $booking->user_id = $request->edit_user;
            $booking->route_date = $request->edit_route_date;

            if($booking->save()){
                $message = ['success' => true];
            } else {
                $message = ['success' => false];
            }
            
            return response()->json($message);
        } 


       return response()->json($validator->errors());
    }


    public function get_booking_list_by_user(Request $request)
    {
        $booking = DB::table('booking_routes')
        ->leftJoin('users', 'booking_routes.user_id', '=', 'users.id')
        ->select('booking_routes.id','booking_routes.store_name', 'booking_routes.description', 
        'booking_routes.address', 'booking_routes.lat', 'booking_routes.lng', 'booking_routes.scheduled',
         'booking_routes.user_id', 'booking_routes.route_date', 'users.name' )
        ->where('booking_routes.user_id', $request->id)
        ->where('booking_routes.scheduled', $request->scheduled)->get();
        return json_decode($booking);
    }
}
