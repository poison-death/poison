@extends('admin.layout.index');

@section('text')

<div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ $title }}</h4>
      <form class="forms-sample" action="/admin/article" method="post">
        <div class="form-group">
          <label for="exampleFormControlSelect1">标题</label>
          <input class="form-control" type="text" name="title" placeholder="标题" style="width: 790px;">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">作者</label>
          <input class="form-control" type="text" name="author" placeholder="作者" style="width: 790px;">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">发布人</label>
          <!-- <input class="form-control" type="text" name="uid" placeholder="发布人" style="width: 790px;"> -->
          <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="uid" style="width: 790px;">
          <option value="0">--请选择--</option>
          @foreach($users as $k=>$v)
          <option value="{{ $v->id }}">{{ $v->uname }}</option>
          @endforeach
        </select>
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">所属类别</label>
        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="cid" style="width: 790px;">
          <option value="0">--请选择--</option>
          @foreach($cate as $k=>$v)
          <option value="{{ $v->id }}">{{ $v->cname }}</option>
          @endforeach
        </select>
      </div>
        <!-- 加载编辑器的容器 -->
	    <script id="container" name="content" type="text/plain" class="" style="width: 790px;"></script>
        <button class="btn btn-success mr-2" type="submit">提交</button>
        <a class="btn btn-light" href="/admin/article">取消</a>
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