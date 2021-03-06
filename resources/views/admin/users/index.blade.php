@extends('admin.layout.index');

@section('text')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  <form class="form-inline" action="/admin/users" method="get">
        					  <div class="form-group has-success has-feedback">
        					    <input type="text" class="form-control" id="inputSuccess4" aria-describedby="inputSuccess4Status" placeholder="关键字" name="search">
        					    <input type="submit" class="btn btn-light" value="查询">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="/admin/users" class="btn btn-light" value="取消">取消</a>
        					  </div>
        					</form>
                  <table class="table table-dark">
					           <thead>
                      <tr>
                        <th>ID</th>
                        <th>用户</th>
                        <th>头像</th>
                        <th>权限</th>
                        <th>年龄</th>
                        <th>手机</th>
                        <th>邮箱</th>
                        <th>QQ</th>
                        <th>创建时间</th>
                        <th>操作</th>  
                      </tr>
                    </thead>
                    <thead>
                      @foreach($users as $k=>$v)
                      <tr>
                      	<th>{{ $v->id }}</th>
                        <th>{{ $v->uname }}</th>
                        <th><img src="{{ $v->photo }}"></th>
                      	<th>{{ $v->status == 1 ? '管理员' :'普通用户'}}</th>
                      	<th>{{ $v->Userinfo->age }}</th>
                      	<th>{{ $v->Userinfo->phone }}</th>
                      	<th>{{ $v->Userinfo->email }}</th>
                      	<th>{{ $v->Userinfo->qq }}</th>
                      	<th>{{ $v->created_at }}</th>
                      	<th>
                      		<a href="/admin/users/{{ $v->id }}/edit" class="btn btn-light">修改</a>
                          <a href="/admin/password/{{ $v->id }}/edit" class="btn btn-light">修改密码</a>
                      		<form action="/admin/users/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" class="btn btn-light" onclick="return del()">
                      		</form>
                      	</th>
                      </tr>
                      @endforeach
                    </thead>
                  </table>
                  <div id="page_page">
                  	{!! $users->appends($request)->render() !!}
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