
@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
      <div >
        <div class="card p-3">
          @if($item->cover!=null)
          <img src="/images/{{$item->cover}}" class="card-img-top" style="align-self: center;">
          @endif
          <div class="card-body">
            <h4 class="card-title text-center" style="font-weight: bold;">{{ $item->title }}</h4>
            <h6 class="card-title text-center">{{ $item->description }}</h5>
            <p class="card-text">
              AAAAAAAAAAAAphpAAAAAAAAA
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection