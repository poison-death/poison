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
    <form class="forms-sample" action="/admin/users/{{ $id }}" method="post" onsubmit="return check()" enctype="multipart/form-data">
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

      <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios1" value="1" @if($user->status == 1) checked @endif>
        管理员
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios2" value="2" @if($user->status == 2) checked @endif>
        普通用户
      </label>
    </div>


      <div class="form-group">
         <div class="input-group col-xs-12">

      <div class="form-group">
          <input type="file"  class="form-control" accept="image/jpeg,image/jpg,image/png" style="width: 700px; height: 60px;" name="photo" id="personsFile" onchange="uploadImg()">
      </div>

         </div>
       </div>
      <button class="btn btn-success mr-2" type="submit">提交</button>
    </form>
  </div>
</div>
<script type="text/javascript">
function uploadImg() {
    var _name, _fileName, personsFile;
    personsFile = document.getElementById("personsFile");
    _name = personsFile.value;
    _fileName = _name.substring(_name.lastIndexOf(".") + 1).toLowerCase();

    if (_fileName !== "png" && _fileName !== "jpg" && _fileName !== "jpeg") {
        alert("上传图片格式不正确，请重新上传");
        // $(location).attr('href', '/admin/users/create');
        return false;
    }
    return true;
}
function check(){
  // var str = $('personsFile').text();
  var str = document.getElementById("personsFile").value;
  // alert(str);
  if(str.length==0){
    alert("请选择上传");
    return false;
  }
  return true;
}

</script>
@endsection





