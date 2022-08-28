<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Auth;
use Symfony\Component\ExpressionLanguage\Node\FunctionNode;
use Validator;
use Illuminate\Support\Str;

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
        // 画像ファイル取得



        $groups = new Group;
        $groups->group_name = $request->group_name;
        $groups->owner_id = Auth::id();
        $groups->group_contents = $request->group_contents;

        $file = $request->img;

        if ( !empty($file) ) {
    
            // ファイルの拡張子取得
            $ext = $file->guessExtension();
    
            //ファイル名を生成
            $fileName = Str::random(32).'.'.$ext;
    
            // 画像のファイル名を任意のDBに保存
            $groups->img_url = $fileName;
            $groups->save();
    
            //public/uploadフォルダを作成
            $target_path = public_path('/images/');
    
            //ファイルをpublic/uploadフォルダに移動
            $file->move($target_path,$fileName);
    
        }else{
            $groups->save();
        }

        
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
