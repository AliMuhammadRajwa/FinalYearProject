<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function LoadSuperAdmin()
    {
        return view('SuperAdmin.Dashboard.Dashboard');
    }
}
