@extends('admin.layout.index');

@section('text')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  <form class="form-inline" action="/admin/broadcast" method="get">
        					  <div class="form-group has-success has-feedback">
        					    <input type="text" class="form-control" id="inputSuccess4" aria-describedby="inputSuccess4Status" placeholder="关键字" name="search">
        					    <input type="submit" class="btn btn-light" value="查询">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="/admin/broadcast" class="btn btn-light" value="取消">取消</a>
        					  </div>
        					</form>
                  <table class="table table-dark">
					           <thead>
                      <tr>
                        <th>ID</th>
                        <th>图片</th>
                        <th>创建时间</th>
                        <th>状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <thead>
                      @foreach($broadcast as $k=>$v)
                      <tr>
                      	<th>{{ $v->id }}</th>
                      	<th><img src="{{ $v->picture }}" style=""></th>
                        <th>{{ $v->created_at }}</th>
                      	<th>{{ $v->status == 1 ? '启用' : '关闭' }}</th>
                      	<th>
                      		<form action="/admin/broadcast/{{ $v->id }}" method="get" style="display: inline-block;">
                      			<input type="submit" value="图片详情" class="btn btn-light">
                      		</form>
                      		<form action="/admin/broadcast/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" id="delete" class="btn btn-light" onclick="return del()">
                            <a href="/admin/broadcast/{{ $v->id }}/edit" class="btn btn-light">修改</a>
                      		</form>
                      	</th>
                      </tr>
                      @endforeach
                    </thead>
                  </table>
                  <div id="page_page">
                  	{!! $broadcast->appends($request)->render() !!}
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