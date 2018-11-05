<?php

namespace App\Http\Controllers\Admin\Cate;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Cate;
use DB;

class CateController extends Controller
{
    public static function getCates()
    {
        $cate = Cate::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->paginate(20);
        foreach ($cate as $k => $v) {
            $n = substr_count($v->path,',');
            $cate[$k]->cname = str_repeat('|----', $n).$v->cname; 
        }
        return $cate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.cate.index',['title'=>'分类列表','cate'=>self::getCates(),'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cate.create',['title'=>'分类添加','cate'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $pid = $request->input('pid','');
        if ($pid == 0) {
            $path = 0;
        }else{
            $parent_data = Cate::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }

        $cate = new Cate;
        $cate->cname = $request->input('cname','');
        $cate->pid = $request->input('pid','');
        $cate->status = $request->input('status',1);
        $cate->path = $path;
        if ($cate->save()) {
            return redirect('/admin/cate')->with('success','添加成功');
        }else{
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Cate::find($id);
        return view('admin.cate.edit',['title'=>'修改分类','data'=>$data,'cate'=>self::getCates()]);
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
        $child_data = Cate::where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类有子分类,不能修改');
            exit;
        }
        $pid = $request->input('pid','');
        if ($pid == 0) {
            $path = 0;
        }else{
            $parent_data = Cate::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }

        $cate = Cate::find($id);
        $cate->cname = $request->input('cname','');
        $cate->pid = $request->input('pid','');
        $cate->status = $request->input('status',1);
        $cate->path = $path;
        if ($cate->save()) {
            return redirect('/admin/cate')->with('success','修改成功');
        }else{
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
        $child_data = Cate::where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类有子分类,不能删除');
            exit;
        }
        $res = Cate::destroy($id);
        if ($res) {
            return redirect('/admin/cate')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
