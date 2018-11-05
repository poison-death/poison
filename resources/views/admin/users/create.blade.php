@extends('admin.layout.index');

@section('text')
@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{ $title }}</h4>
    <form class="forms-sample" action="/admin/users" method="post">
      
      <div class="form-group">
        <input class="form-control" type="text" name="uname" placeholder="用户名" value="{{ old('uname') }}">
      </div>     
      <div class="form-group">
        <input class="form-control" type="password" name="upwd" placeholder="密码">
      </div>
       <div class="form-group">
        <input class="form-control" type="password" name="reupwd" placeholder="确认密码">
      </div>
      <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="邮箱" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="phone" placeholder="手机" value="{{ old('phone') }}">
      </div>
	  <div class="form-group">
        <input class="form-control" type="text" name="qq" placeholder="QQ" value="{{ old('qq') }}">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="age" placeholder="年龄" value="{{ old('age') }}">
      </div>
      <button class="btn btn-success mr-2" type="submit">提交</button>
      <button class="btn btn-light">取消</button>
    </form>
  </div>
</div>

@endsection





