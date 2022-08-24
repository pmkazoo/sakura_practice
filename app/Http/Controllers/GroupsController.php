<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Auth;
use Symfony\Component\ExpressionLanguage\Node\FunctionNode;
use Validator;

class GroupsController extends Controller
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
    
    //
    public function index(){
        return view('groups');
    }

    public function store(Request $request)
    {
        // //バリデーション 
        // $validator = Validator::make($request->all(), [
        //     '_name' => 'required|max:255'
        // ]);
        
        // //バリデーション:エラー
        // if ($validator->fails()) {
        //     return redirect('/')
        //         ->withInput()
        //         ->withErrors($validator);
        // }
        
        //以下に登録処理を記述（Eloquentモデル）
        $groups = new Group;
        $groups->group_name = $request->group_name;
        $groups->owner_id = Auth::id();
        $groups->group_contents = $request->group_contents;
        $groups->save();
        
        return redirect('/');
        
    }

    public function detail($group_id)
    {
        $group = Group::find($group_id);
        
        return view('group_detail',['group'=>$group]);
    }

    public function request($group_id)
    {
        $group = Group::find($group_id);

        return view('group_request',['group'=>$group]);
    }

    public function request_confirm(Request $request)
    {
        //以下に登録処理を記述（Eloquentモデル）
        $group = Group::find($request->group_id);

        $group->members()->attach(Auth::user(),['request_message' => $request->request_message,'matching_flg' => 0]);
        
        return view('group_request_complete');
    }
    
}
