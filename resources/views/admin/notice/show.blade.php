@extends('admin.layout.index');

@section('text')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{ $notice->wzbt }}</h4>
    <div class="float-chart-container">
      <div class="float-chart" id="line-chart" style="height: 700px;">
      	<p>{!! $notice->txt !!}</p>
      	<p><img src="{{ $notice->pic }}" style="width: 800px;"></p>
      </div>
    </div>
  </div>
</div>

@endsection