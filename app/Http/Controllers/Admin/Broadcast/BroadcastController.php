<?php

namespace App\Http\Controllers\Admin\Broadcast;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Broadcast;
use DB;

class BroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $broadcast = Broadcast::where('created_at','like','%'.$search.'%')->paginate(5);
        return view('admin.broadcast.index',['broadcast'=>$broadcast,'title'=>'轮播图列表','request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.broadcast.create',['title'=>'添加轮播图']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file('file');
        // dump($file);
        //处理表单提交信息
        if($request -> hasFile('picture')){
            $picture = $request -> file('picture');
            $ext = $picture ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/picture/'.date('Ymd',time());
            $res = $picture -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        DB::beginTransaction();
        // 获取数据保存到数据库
        $broadcast = new Broadcast;
        $broadcast->id = $request->input('id');
        $broadcast->status = $request->input('status',2);
        $broadcast->picture = $slide_path;
        // $broadcast->describe = $request->input('describe');
        // 判断数据是否存储成功
        if ($broadcast->save()) {
            DB::commit();
            return redirect('/admin/broadcast')->with('success','添加成功');
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
        $broadcast = Broadcast::find($id);
        return view('admin.broadcast.show',['title'=>'详情','broadcast'=>$broadcast]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $broadcast = Broadcast::find($id);
        return view('admin.broadcast.edit',['title'=>'修改','broadcast'=>$broadcast]);
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
        $broadcast = Broadcast::find($id);
        $broadcast->status = $request->input('status');
        if ($broadcast->save()) {
            DB::commit();
            return redirect('/admin/broadcast')->with('success','修改成功');
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
        $res = Broadcast::destroy($id);
        if ($res) {
            return redirect('/admin/broadcast')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
