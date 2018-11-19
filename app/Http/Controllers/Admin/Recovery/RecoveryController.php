<?php

namespace App\Http\Controllers\Admin\Recovery;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Article;
use App\Admin\Recovery;
use DB;

class RecoveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recovery = Recovery::all();
        return view('admin.recovery.index',['recovery'=>$recovery,'title'=>'回收站']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        DB::beginTransaction();
        $article = Article::onlyTrashed()->get();
        $recovery = new Recovery;
        foreach ($article as $k => $v) {
            $recovery->aid = $v->id;
            $recovery->title = $v->title;
            $res = $recovery->save();
        }
        if ($res) {
            DB::commit();
            return redirect('/admin/article')->with('success','删除成功');
        }else{
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }   
    public function delete($id)
    {
        DB::beginTransaction();
        $res = Article::destroy($id);
        if ($res) {
            DB::commit();
            return redirect('/admin/recovery/create')->with('success','删除成功');
        }else{
            DB::rollback();
            return back()->with('error','删除失败');
        }
    }
    public function huifu($id)
    {
        DB::beginTransaction();
        $res = Article::withTrashed()->where('id','=',$id)->restore();
        $res1 = Recovery::where('aid','=',$id)->delete();
        if ($res && $res1) {
            DB::commit();
            return redirect('/admin/article')->with('success','恢复成功');
        }else{
            DB::rollback();
            return back()->with('error','恢复失败');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $res = Recovery::destroy($id);
        if ($res) {
            return redirect('/admin/recovery')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
