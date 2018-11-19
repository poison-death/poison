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
     <form class="forms-sample" action="/admin/wzsz/{{ $wzsz->id }}" style="width: 790px;" method="post">
      {{ method_field('PUT') }}
      <div class="form-group">
        <label for="exampleFormControlSelect1">网站标题</label>
        <input class="form-control" type="text" name="head" placeholder="网页标题" value="{{ $wzsz->head }}">
      </div> 
      <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios1" value="1" @if($wzsz->status == 1) checked @endif>
        开启
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="status" id="optionsRadios2" value="2" @if($wzsz->status == 2) checked @endif>
        关闭
      </label>
    </div>

		    <button class="btn btn-success mr-2" type="submit">提交</button>
       	<a class="btn btn-light" href="/admin/wzsz">取消</a>
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
        $(location).attr('href', '/admin/wzsz/create');
        return false;
    }
    return true;
}
function uploadImgs() {
    var _name, _fileName, personsFile;
    personsFile = document.getElementById("personsFile");
    _name = personsFile.value;
    _fileName = _name.substring(_name.lastIndexOf(".") + 1).toLowerCase();

    if (_fileName !== "png" && _fileName !== "jpg" && _fileName !== "jpeg") {
        alert("上传图片格式不正确，请重新上传");
        $(location).attr('href', '/admin/wzsz/create');
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