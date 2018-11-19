<?php

namespace App\Http\Controllers\Admin\Wzsz;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Wzsz;
use App\Admin\Wzkg;
use DB;

class WzszController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wzsz = Wzsz::all();
        return view('admin.wzsz.index',['wzsz'=>$wzsz,'title'=>'相关设置']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wzsz.create',['title'=>'网站开关','title1'=>'网站设置']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wzkg = Wzkg::find(1);
        $wzkg->kg = $request->kg;  
        if($wzkg -> save()){
            return redirect('/admin/wzsz/create')->with('success', '修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
    public function store1(Request $request)
    {
        if($request -> hasFile('ico')){
            $ico = $request -> file('ico');
            $ext = $ico ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/ico/'.date('Ymd',time());
            $res = $ico -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        if($request -> hasFile('logo')){
            $logo = $request -> file('logo');
            $ext = $logo ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/logo/'.date('Ymd',time());
            $res = $logo -> move($dir_name,$file_name);
            $slide_path1 = ltrim($dir_name.'/'.$file_name,'.');
        }
        DB::beginTransaction();
        // 获取数据保存到数据库
        $wzsz = new Wzsz;
        $wzsz->id = $request->input('id');
        $wzsz->ico = $slide_path;
        $wzsz->logo = $slide_path1;
        $wzsz->head = $request->input('head');
        $wzsz->status = $request->input('status',2);
        $res = $wzsz->save();
        if ($res) {
            DB::commit();
            return redirect('/admin/wzsz')->with('success','添加成功');
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
        $wzsz = Wzsz::find($id);
        return view('admin.wzsz.show',['title'=>'详情','wzsz'=>$wzsz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wzsz = Wzsz::find($id);
        return view('admin.wzsz.edit',['title'=>'修改设置','wzsz'=>$wzsz]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        // 获取数据保存到数据库
        $wzsz = Wzsz::find($id);
        $wzsz->head = $request->input('head');
        $wzsz->status = $request->input('status');
        $res = $wzsz->save();
        if ($res) {
            DB::commit();
            return redirect('/admin/wzsz')->with('success','修改成功');
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
        $res = Wzsz::destroy($id);
        if ($res) {
            return redirect('/admin/wzsz')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
