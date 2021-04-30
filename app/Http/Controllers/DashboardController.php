<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use DB;

class DashboardController extends Controller
{
    public function index(){


        return view('admin.pages.dashboard');
    }


}
