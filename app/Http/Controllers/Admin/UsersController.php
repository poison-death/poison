<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\EditStoreRequest;
use App\Admin\Users;
use App\Admin\Usersall;
use Hash;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $users = Users::where('uname','like','%'.$search.'%')->paginate(5);
        return view('admin.users.index',['title'=>'用户列表','users'=>$users,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        DB::beginTransaction();
        if($request -> hasFile('photo')){
            $photo = $request -> file('photo');
            $ext = $photo ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './users/uploads/photo/'.date('Ymd',time());
            $res = $photo -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        $users = new Users;
        $users->photo = $slide_path;
        $users->uname = $request->input('uname');
        $users->status = $request->input('status',1);
        $users->upwd = Hash::make($request->input('upwd'));
        $res1 = $users->save();
        $id = $users->id;
        $usersall = new Usersall;
        $usersall->uid = $id;
        $usersall->phone = $request->input('phone');
        $usersall->email = $request->input('email');
        $usersall->qq = $request->input('qq');
        $usersall->age = $request->input('age');
        $res2 = $usersall->save();
        if ($res1 && $res2) {
            DB::commit();
            return redirect('/admin/users')->with('success','添加成功');
        }else{
            DB::rollback();
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);
        return view('admin.users.show',['title'=>'修改密码','user'=>$user,'id'=>$id]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);
        return view('admin.users.edit',['title'=>'用户修改','user'=>$user,'id'=>$id]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditStoreRequest $request, $id)
    {
        DB::beginTransaction();
        if($request->hasFile('photo')){
            $photo = $request -> file('photo');
            $ext = $photo ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './users/uploads/photo/'.date('Ymd',time());
            $res = $photo -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        $users = Users::find($id);
        $users->photo = $slide_path;
        $users->status = $request->input('status');
        $users->uname = $request->input('uname');
        $res1 = $users->save();
        $users->userinfo->phone = $request->input('phone');
        $users->userinfo->email = $request->input('email');
        $users->userinfo->qq = $request->input('qq');
        $users->userinfo->age = $request->input('age');
        $res2 = $users->userinfo->save();
        if ($res1 && $res2) {
            DB::commit();
            return redirect('/admin/users')->with('success','修改成功');
        }else{
            DB::rollback();
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $res1 = Users::destroy($id);
        $res2 = Usersall::where('uid',$id)->delete();
        if ($res1 && $res2) {
            DB::commit();
            return redirect('/admin/users')->with('success','删除成功');
        }else{
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }

}
