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
                        <th>链接</th>
                        <th>链接名称</th>
                        <th>图片</th>
                        <th>创建时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <thead>
                      @foreach($link as $k=>$v)
                      <tr>
                        <th>{{ $v->id }}</th>
                        <th>{{ $v->link }}</th>
                      	<th>{{ $v->lname }}</th>
                      	<th><img src="{{ $v->pic }}" style=""></th>
                      	<th>{{ $v->created_at }}</th>
                      	<th>
                      		<form action="/admin/link/{{ $v->id }}" method="get" style="display: inline-block;">
                      			<input type="submit" value="详情" class="btn btn-light">
                      		</form>
                      		<form action="/admin/link/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" id="delete" class="btn btn-light" onclick="return del()">
                      		</form>
                      	</th>
                      </tr>
                      @endforeach
                    </thead>
                  </table>
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