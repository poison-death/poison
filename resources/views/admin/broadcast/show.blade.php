@extends('admin.layout.index');

@section('text')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{ $broadcast->created_at }}</h4>
    <div class="float-chart-container">
      <div class="float-chart" id="line-chart">
        <p>
          <img src="{!! $broadcast->picture !!}" style="width: 800px;">
        </p>
      </div>
    </div>
  </div>
</div>

@endsection