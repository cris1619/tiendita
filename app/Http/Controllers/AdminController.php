<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function test_admin(Request $request){
        return view('admin.test_admin');
    }
}
