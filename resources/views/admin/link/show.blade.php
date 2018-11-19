@extends('admin.layout.index');

@section('text')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{ $link->lname }}</h4>
    <div class="float-chart-container">
      <div class="float-chart" id="line-chart" style="height: 800px;">
        <span>{{ $link->link }}</span>
        <p>
          <img src="{!! $link->pic !!}" style="width: 800px;">
        </p>
      </div>
    </div>
  </div>
</div>

@endsection