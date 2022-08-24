<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Auth;
use Validator;

class MatchingController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('matching',['matching'=>$request]);
    }

    public function request(Request $request)
    {
            
        return view('matching_request_confirm');
    }

}
