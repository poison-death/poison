<?php

namespace App\Http\Controllers\Admin\Notice;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Notice;
use DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = Notice::all();
        return view('admin.notice.index',['notice'=>$notice,'title'=>'公告列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create',['title'=>'添加公告']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> hasFile('pic')){
            $pic = $request -> file('pic');
            $ext = $pic ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/gonggao/'.date('Ymd',time());
            $res = $pic -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        DB::beginTransaction();
        $notice = new Notice;
        $notice->wzbt = $request->input('wzbt');
        $notice->status = $request->input('status',2);
        $notice->txt = $request->input('txt');
        $notice->pic = $slide_path;
        if ($notice->save()) {
            DB::commit();
            return redirect('/admin/notice')->with('success','添加成功');
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
        $notice = Notice::find($id);
        return view('admin.notice.show',['notice'=>$notice,'title'=>'公告详情']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Notice::find($id);
        return view('admin.notice.edit',['data'=>$data,'title'=>'修改公告']);
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
        $notice = Notice::find($id);
        $notice->wzbt = $request->input('wzbt');
        $notice->status = $request->input('status');
        $notice->txt = $request->input('txt');
        if ($notice->save()) {
            DB::commit();
            return redirect('/admin/notice')->with('success','修改成功');
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
        $res = Notice::destroy($id);
        if ($res) {
            return redirect('/admin/notice')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
