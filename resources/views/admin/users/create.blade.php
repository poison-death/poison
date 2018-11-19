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
    <form class="forms-sample" action="/admin/users" method="post" onsubmit="return check()" enctype="multipart/form-data">
      
      <div class="form-group">
        <input class="form-control" type="text" name="uname" placeholder="用户名" value="{{ old('uname') }}">
      </div>     
      <div class="form-group">
        <input class="form-control" type="password" name="upwd" placeholder="密码">
      </div>
       <div class="form-group">
        <input class="form-control text-left" type="password" name="reupwd" placeholder="确认密码">
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

      <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios1" value="1" checked>
        管理员
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios2" value="2">
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
      <a class="btn btn-light" href="/admin/users">取消</a>
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





