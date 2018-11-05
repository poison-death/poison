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
    <form class="forms-sample" action="/admin/users/{{ $id }}" method="post">
      {{ method_field('PUT') }}
      <div class="form-group">
        <input class="form-control" type="text" name="uname" placeholder="用户名" value="{{ $user->uname }}">
      </div>     
      <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="邮箱" value="{{ $user->Userinfo->email }}">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="phone" placeholder="手机" value="{{ $user->Userinfo->phone }}">
      </div>
	  <div class="form-group">
        <input class="form-control" type="text" name="qq" placeholder="QQ" value="{{ $user->Userinfo->qq }}">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="age" placeholder="年龄" value="{{ $user->Userinfo->age }}">
      </div>
      <button class="btn btn-success mr-2" type="submit">提交</button>
    </form>
  </div>
</div>

@endsection





