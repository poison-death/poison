@extends('admin.layout.index');

@section('text')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{ $wzsz->head }}</h4>
    <div class="float-chart-container">
      <div class="float-chart" id="line-chart">
      	
      	<p>
      		<label for="exampleFormControlSelect1">标题图标</label><br>
      		<img src="{{ $wzsz->ico }}" style="width: 30px;">
      	</p>
      	<p>
      		<label for="exampleFormControlSelect1">网站logo</label><br>
      		<img src="{{ $wzsz->logo }}" style="width: 100px;">
      	</p>
      </div>
    </div>
  </div>
</div>

@endsection