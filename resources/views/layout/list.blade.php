@extends('layout.app')
@section('content')
<div class="container">
    <div class="tm-md-12 tm-sm-12">
      <div class="card p-3 border-dark">
        <ol class="list-group list-group-numbered">
        @if(empty($won))
          <h3 style="text-align: center;">No auctions won :(</h3>
        @else
          @foreach($won as $w)
            <li class="list-group-item d-flex justify-content-center align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">{{$w->title}}</div>
                Price: {{$w->final_amount}}<br>
              </div>          
            </li>
          @endforeach
        @endif
          </ol>
      </div>
    </div>
</div>
@endsection