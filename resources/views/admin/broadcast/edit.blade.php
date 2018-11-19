@extends('admin.layout.index');

@section('text')

<div class="card">
   <div class="card-body">
     <h4 class="card-title">{{ $title }}</h4>
     <form class="forms-sample" action="/admin/broadcast/{{ $broadcast->id }}" method="post" enctype="multipart/form-data">
       {{ method_field('PATCH') }}
      <div class="radio">
          <label>
            <input type="radio" name="status" id="optionsRadios1" value="1" @if($broadcast->status == 1 ) checked @endif>
            开启
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="status" id="optionsRadios2" value="2" @if($broadcast->status == 2 ) checked @endif>
            关闭
          </label>
        </div>

		    <button class="btn btn-success mr-2" type="submit">提交</button>
       	<a class="btn btn-light" href="/admin/broadcast">取消</a>
     </form>
   </div>
</div>


@endsection