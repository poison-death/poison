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
                        <th>公告标题</th>
                        <th>公告图片</th>
                        <th>内容</th>
                        <th>状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <thead>
                      @foreach($notice as $k=>$v)
                      <tr>
                        <th style="line-height: 50px;">{{ $v->id }}</th>
                        <th style="line-height: 50px;">{{ $v->wzbt }}</th>
                        <th><img src="{{ $v->pic }}"></th>
                        <th>{!! $v->txt !!}</th>
                        <th style="line-height: 50px;">{{ $v->status == 1 ? '开启' : '关闭' }}</th>
                      	<th>
                      		<form action="/admin/notice/{{ $v->id }}" method="get" style="display: inline-block;">
                      			<input type="submit" value="内容详情" class="btn btn-light">
                      		</form>
                      		<form action="/admin/notice/{{ $v->id }}" method="post" style="display: inline-block;">
                      			{{ method_field('DELETE') }}
                      			<input type="submit" value="删除" class="btn btn-light" onclick="return del()">
                      		</form>
                          <a href="/admin/notice/{{ $v->id }}/edit" class="btn btn-light">修改</a>
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