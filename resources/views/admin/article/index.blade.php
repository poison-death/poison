@extends('admin.layout.index');

@section('text')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  <form class="form-inline" action="/admin/article" method="get">
        					  <div class="form-group has-success has-feedback">
        					    <input type="text" class="form-control" id="inputSuccess4" aria-describedby="inputSuccess4Status" placeholder="关键字" name="search">
                      <input type="submit" class="btn btn-light" value="查询">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        					    <a href="/admin/article" class="btn btn-light" value="取消">取消</a>
        					  </div>
        					</form>
                  <table class="table table-dark">
					<thead>
                      <tr>
                        <th>ID</th>
                        <th>发布人</th>
                        <th>发布人ID</th>
                        <th>所属类别</th>
                        <th>所属类别ID</th>
                        <th>文章标题</th>
                        <th>文章作者</th>
                        <th>发布时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <thead>
                      @foreach($article as $k=>$v)
                      <tr>
                        <th>{{ $v->id }}</th>
                        <th>{{ $v->users['uname'] }}</th>
                        <th>{{ $v->uid }}</th>
                        <th>{{ $v->cates['cname'] }}</th>
                      	<th>{{ $v->cid }}</th>
                      	<th>{{ $v->title }}</th>
                        <th>{{ $v->author }}</th>
                      	<th>{{ $v->created_at }}</th>
                      	<th>
                      		<form action="/admin/article/{{ $v->id }}" method="get" style="display: inline-block;">
                      			<input type="submit" value="文章详情" class="btn btn-light">
                      		</form>
                      		<form action="/admin/article/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" class="btn btn-light" onclick="return del()">
                      		</form>
                          <a href="/admin/recovery/delete/{{ $v->id }}" class="btn btn-light" style="display: inline-block;">回收站</a>
                      	</th>
                      </tr>
                      @endforeach
                    </thead>
                  </table>
                  <div id="page_page">
                    {!! $article->appends($request)->render() !!}
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
              function del()
              {
                if(confirm("确定要删除吗？")){
                    return true;
                }else{
                    return false;
                }  
              }
            </script>
@endsection