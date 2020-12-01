<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        return view('pages.dashboard.index', $data);
    }
}
