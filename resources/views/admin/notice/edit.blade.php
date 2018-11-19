@extends('admin.layout.index');

@section('text')

<div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ $title }}</h4>
     <form class="forms-sample" action="/admin/notice/{{ $data->id }}" method="post" enctype="multipart/form-data" onsubmit="return check()">
        {{ method_field('PATCH') }}
      <div class="form-group">
        <label>网站标题</label>
        <input class="form-control" type="text" value="{{ $data->wzbt }}" placeholder="名称" name="wzbt" style="width: 790px;">
      </div>
        <div class="radio">
          <label>
            <input type="radio" name="status" id="optionsRadios1" value="1" @if($data->status == 1 ) checked @endif>
            开启
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="status" id="optionsRadios2" value="2" @if($data->status == 2 ) checked @endif>
            关闭
          </label>
        </div>

      <label for="exampleFormControlSelect1">网站简介</label> 
      <script id="container" name="txt" type="text/plain" class="" style="width: 790px;">{!! $data->txt !!}</script>  
       <div class="form-group">
         <div class="input-group col-xs-12">
  
         </div>
       </div>

		<button class="btn btn-success mr-2" type="submit">提交</button>
		<button class="btn btn-light">取消</button>
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
        $(location).attr('href', '/admin/notice/create');
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
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
@endsection