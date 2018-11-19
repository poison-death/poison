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
                        <th>AID</th>
                        <th>文章标题</th>
                        <th>删除时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <thead>
                      @foreach($recovery as $k=>$v)
                      <tr>
                      	<th>{{ $v->id }}</th>
                        <th>{{ $v->aid }}</th>
                      	<th>{{ $v->title }}</th>
                      	<th>{{ $v->created_at }}</th>
                      	<th>
                      		<form action="/admin/recovery/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" class="btn btn-light" onclick="return del()">
                      		</form>
                          <a href="/admin/recovery/huifu/{{ $v->aid }}" class="btn btn-light" style="display: inline-block;">恢复</a>
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