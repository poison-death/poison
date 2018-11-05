@extends('admin.layout.index');

@section('text')

<div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ $title }}</h4>
      <form action="/admin/cate/{{ $data->id }}" method="post">
        {{ method_field('PATCH') }}
      <div class="form-group">
        <label>分类名称</label>
        <input class="form-control" type="text" value="{{ $data->cname }}" placeholder="名称" name="cname">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">所属类别</label>
        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="pid">
          <option value="0">--请选择--</option>
          @foreach($cate as $k=>$v)
          <option value="{{ $v->id }}" @if($data->pid == $v->id) selected @endif>{{ $v->cname }}</option>
          @endforeach
        </select>
      </div>
        <div class="radio">
		  <label>
		    <input type="radio" name="status" id="optionsRadios1" value="1" @if($data->status == 1) checked @endif>
		    激活
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="status" id="optionsRadios2" value="2" @if($data->status == 2) checked @endif>
		    未激活
		  </label>
		</div>
		<button class="btn btn-success mr-2" type="submit">提交</button>
		<button class="btn btn-light">取消</button>
		</form>
	</div>
				
</div>

@endsection