<?php

namespace App\Http\Controllers\backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// use App\Models\
use App\Traits\Definitions;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
        return view('Dashboard.backend-dashboard');
    }
}
