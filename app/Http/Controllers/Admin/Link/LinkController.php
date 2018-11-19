<?php

namespace App\Http\Controllers\Admin\Link;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Link;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = Link::all();
        return view('admin.link.index',['link'=>$link,'title'=>'友情链接列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create',['title'=>'添加友情链接']);
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
            $picture = $request -> file('pic');
            $ext = $picture ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/pic/'.date('Ymd',time());
            $res = $picture -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        DB::beginTransaction();
        // 获取数据保存到数据库
        $link = new Link;
        $link->id = $request->input('id');
        $link->lname = $request->input('lname');
        $link->pic = $slide_path;
        $link->link = $request->input('link');
        // 判断数据是否存储成功
        if ( $link->save() ) {
            DB::commit();
            return redirect('/admin/link')->with('success','添加成功');
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
        $link = Link::find($id);
        return view('admin.link.show',['link'=>$link]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Link::destroy($id);
        if ($res) {
            return redirect('/admin/link')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
