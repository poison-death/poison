@extends('admin.layout.index');

@section('text')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{ $article->title }}</h4>
    <div class="float-chart-container">
      <div class="float-chart" id="line-chart">
      	<p>{!! $article->content !!}</p>
      </div>
    </div>
  </div>
</div>

@endsection