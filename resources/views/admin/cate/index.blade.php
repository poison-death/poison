@extends('admin.layout.index');

@section('text')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  <table class="table table-dark">
					<thead>
                      <tr>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th>属性分类ID</th>
                        <th>分类路径</th>
                        <th>分类状态</th>  
                        <th>操作</th>  
                      </tr>
                    </thead>
                    <thead>
                      @foreach($cate as $k=>$v)
                      <tr>
                      	<th>{{ $v->id }}</th>
                      	<th>{{ $v->cname }}</th>
                      	<th>{{ $v->pid }}</th>
                      	<th>{{ $v->path }}</th>
                      	<th>{{ $v->status == 1 ? '激活' : '未激活' }}</th>                      	
                      	<th>
                      		<a href="/admin/cate/{{ $v->id }}/edit" class="btn btn-light">修改</a>
                      		<form action="/admin/cate/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" class="btn btn-light" onclick="return del()">
                      		</form>
                      	</th>
                      </tr>
                      @endforeach
                    </thead>
                  </table>
                  <div id="page_page">
                  	{!! $cate->appends($request)->render() !!}
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