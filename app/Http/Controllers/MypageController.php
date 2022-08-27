<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Auth;

class MypageController extends Controller
{
        // 以下を追加すると、必ず認証が求められる
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $my_groups = Group::where('owner_id','=',Auth::id())->get();

        $my_requests = User::find(Auth::id())->request_group()->get();
        
        return view('mypage',['groups'=>$my_groups,'requests'=>$my_requests]);
    }

    public function detail($group_id)
    {
        $group = Group::find($group_id);

        $requests = $group->members()->get();

        return view('mygroup_detail',['group'=>$group,'requests'=>$requests]);
    }

    public function response(Request $request)
    {
        $group = Group::find($request->group_id);

        if($request->judge == "OK"){
            $group->members()->syncWithPivotValues($request->user_id,['matching_flg' => 1],false);
         }else{
            $group->members()->syncWithPivotValues($request->user_id,['matching_flg' => 2],false);
        }

        $requests = $group->members()->get();

        return view('mygroup_detail',['group'=>$group,'requests'=>$requests]);

    }

}
