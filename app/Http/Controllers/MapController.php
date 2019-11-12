<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class MapController extends Controller
{
    //
    public function index()
    {
        Mapper::map(15.1623082, 120.5976015);

        return view('pages.admin.map');
    }
}
