<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login(Request $request){
        $ipAddress = $request->ip();
        $requestCount = Session::get('request_count_' . $ipAddress);
        if($requestCount > 1){
            return view('another_session');
        }
        
        return view('login');
    }

    public function closeSession(Request $request)
    {
        $ipAddress = $request->ip();
        Session::put('request_count_' . $ipAddress, 0);
        return redirect()->route('login');
    }
}
