<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\User;

class UserController extends Controller
{
    public function index(){
        return view('pages.user.index');
    }
}
