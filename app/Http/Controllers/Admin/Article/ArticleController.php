<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Article;
use App\Admin\Cate;
use App\Admin\Users;
use DB;

class ArticleController extends Controller
{
    // public static function getCates()
    // {
    //     $cate = Cate::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->paginate(20);
    //     foreach ($cate as $k => $v) {
    //         $n = substr_count($v->path,',');
    //         $cate[$k]->cname = str_repeat('|----', $n).$v->cname; 
    //     }
    //     return $cate;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cate = Cate::all();
        $users = Cate::all();
        $search = $request->input('search','');
        $article = Article::where('title','like','%'.$search.'%')->paginate(5);
        // $article = Article::all();
        return view('admin.article.index',['users'=>$users,'cate'=>$cate,'article'=>$article,'title'=>'文章列表','request'=>$request->all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article;
                //获取类别
        $cates = Cate::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        $users = Users::where('status','=',1)->get();
        // 统计逗号出现的次数
        foreach ($cates as $k => $v) {
            $n = substr_count($v->path,',');
            $cates[$k]->cname = str_repeat('|----',$n).$v->cname;
        }
        return view('admin.article.create',['title'=>'文章添加','cate'=>$cates,'article'=>$article,'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $article = new Article;
        $article->title = $request->input('title','');
        $article->content = $request->input('content','');
        $article->author = $request->input('author','');
        $article->uid = $request->input('uid');
        $article->cid = $request->input('cid');


        $res1 = $article->save();
        if ($res1) {
            DB::commit();
            return redirect('/admin/article')->with('success','添加成功');
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
        $article = Article::find($id);
        return view('admin.article.show',['title'=>'文章详情','article'=>$article]);
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
        $res = Article::destroy($id);
        if ($res) {
            return redirect('/admin/article')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
