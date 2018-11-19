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
    <form class="forms-sample" action="/admin/password/{{ $id }}" method="post">
      {{ method_field('PUT') }}
      <div class="form-group">
        <input class="form-control" type="password" name="upass" placeholder="旧密码" value="">
      </div>     
      <div class="form-group">
        <input class="form-control" type="password" name="upwd" placeholder="新密码" value="">
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="reupwd" placeholder="确认密码" value="">
      </div>
      <button class="btn btn-success mr-2" type="submit">提交</button>
    </form>
  </div>
</div>

@endsection