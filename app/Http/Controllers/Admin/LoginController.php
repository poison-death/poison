<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Admin\Users;
use App\Admin\Usersall;
use Hash;
use DB;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login.login',['title'=>'登录']);
    }

    public function ratio(Request $request)
    {
        DB::beginTransaction();
        $name = $request->input('name');
        $upass = $request->input('upass');
        
        $users = Users::all();
        foreach ($users as $k=>$v) {
            if ($name === $v->uname) {
                if(strpos($v->uname, $name)!==false && Hash::check($upass,$v->upwd) && $v->status == 1) {
                    DB::commit();
                    session(['admin'=>true]);
                    session(['user' => $v->uname]);
                    session(['pic' => $v->photo]);
                    return redirect('/admin')->with('success','登录成功');
                }else if(strpos($v->uname, $name)!==false && Hash::check($upass,$v->upwd) && $v->status == 2){
                        DB::rollback();
                        return back()->with('error','非管理员不能登录');
                }else{
                    DB::rollback();
                    return back()->with('error','密码或账号错误');
                }
            }
        } 
        return back()->with('error','用户名错误');     
    }
    
    public function forget()
    {
        return view('admin.login.forget',['title'=>'找回密码']);
    }
    
}