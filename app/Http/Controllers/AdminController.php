<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class AdminController extends Controller
{
    public function LoadAdmin()
    {

        return view('Dashboard.dashboard');
    }
}
