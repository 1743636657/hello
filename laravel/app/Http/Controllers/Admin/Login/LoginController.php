<?php

namespace App\Http\Controllers\Admin\Login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\user;
use DB;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Admin.Login.Index',['title'=>'后台登陆']);
    }

    public function getLogin(Request $request)
    {
        //获取用户输入信息
        $data = $request->except('_token');
        $username = $data['user_name'];
        $pass = $data['password'];
        //查询数据库是否存在用户
        $tem = user::where('user_name',$username)->first();
        //验证用户名是否存在
        if(empty($tem)){
            return back()->with('error','用户名不存在');
          }
        //验证密码
        if($pass != $tem['password']){
            return back()->with('error','密码错误');
        }
        //验证权限
        if($tem['status'] != 2){
            return back()->with('error','权限不够');
        }else{
            //取值并给session赋值
             $info = $tem['user_name'];
              session(['login' => $info]);
            return view('Admin.Index.Index');
        }
    }

    public function outLogin()
    {
        //清除session并跳转页面
        session(['login' => null]);
        return redirect('/Admin/Login');
    }
}
