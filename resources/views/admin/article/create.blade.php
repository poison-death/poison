@extends('admin.layout.index');

@section('text')

<div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ $title }}</h4>
      <form class="forms-sample" action="/admin/article" method="post">
        <div class="form-group">
          <input class="form-control" type="text" name="title" placeholder="标题" style="width: 790px;">
        </div>
        <!-- 加载编辑器的容器 -->
	    <script id="container" name="content" type="text/plain" class="" style="width: 790px;"></script>
        <button class="btn btn-success mr-2" type="submit">提交</button>
        <button class="btn btn-light">取消</button>
      </form>
    </div>
</div>
 
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>


@endsection