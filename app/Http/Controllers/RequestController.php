<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use Auth;
use Validator;
use App\User;

class RequestController extends Controller
{
    public function viewstudentrequest(){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="admin"){
                $result = DB::table('Requests')
                    ->Select('*')
                    ->get();
                return view('viewstudentrequest', ['result' => $result]);
            }
            else{
                return view('noPermission');
            }
        }
    }
}
