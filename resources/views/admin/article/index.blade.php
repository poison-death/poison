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
                        <th>文章标题</th>
                        <th>发布时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <thead>
                      @foreach($article as $k=>$v)
                      <tr>
                      	<th>{{ $v->id }}</th>
                      	<th>{{ $v->title }}</th>
                      	<th>{{ $v->created_at }}</th>
                      	<th>
                      		<form action="/admin/article/{{ $v->id }}" method="get" style="display: inline-block;">
                      			<input type="submit" value="文章详情" class="btn btn-light">
                      		</form>
                      		<form action="/admin/article/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" class="btn btn-light">
                      		</form>
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

@endsection