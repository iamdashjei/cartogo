<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
   //
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
        $data['tasks'] = [
            [
                    'name' => 'Design New Dashboard',
                    'progress' => '87',
                    'color' => 'danger'
            ],
            [
                    'name' => 'Direct Sales',
                    'progress' => '76',
                    'color' => 'warning'
            ],
            [
                    'name' => 'Updated Booking Route',
                    'progress' => '80',
                    'color' => 'success'
            ],
            [
                    'name' => 'Invoice Module',
                    'progress' => '56',
                    'color' => 'info'
            ],
            [
                    'name' => 'Generate Reports',
                    'progress' => '10',
                    'color' => 'success'
            ]
        ];
        return view('pages.admin.dashboard')->with($data);
    }
}
