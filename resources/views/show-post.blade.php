@extends('layout.app')
@section('content')
<div class="container-xxl">
    <div class="row">
      <div class="col">
        <h3 class="mt-4 text-center">{{ $item->title }}</h3>
        <div class="card p-3 border-dark">
            <img src="https://2.bp.blogspot.com/-muVbmju-gkA/Vir94NirTeI/AAAAAAAAT9c/VoHzHZzQmR4/s580/placeholder-image.jpg" class="card-img-top" style="align-self: center;" width="23">
          <div class="card-body">
            <h3 class="text-center">Description</h3>
            <h6 class="card-footer p-3">{{ $item->description }}</h5>
          </div>
        </div>
      </div>
      <div class="col-7">
      <h3 class="mt-4 text-center">About</h3>
        <div class="card p-3 border-dark">
          <div class="card-body">
            <div class="row">
              <h5 class="elem">
                <div>Current bids:</div>
                <div class="dots"></div>
                <div id="p1">{{ $item->bidder_count }}</div>
              </h5></div>
              <h5 class="elem">
                @foreach ($conditions as $condition)
                  @if ($item->condition_id == $condition->id)
                  <div>Condition:</div>
                  <div class="dots"></div>
                  <div>{{ $condition->name }}</div>
                  @endif
                @endforeach
              </h5>
              <h5 class="elem">
                  <div>Current Price, €:</div>
                  <div class="dots"></div>
                  <div id="price">{{$item->price}}</div>
              </h5>
              <h6 class="text-center">
                @if (new DateTime($item->end_date) <= new DateTime(\Carbon\Carbon::now()))
                  <b id="status">Auction Has Ended</b>
                @elseif (round((strtotime($item->end_date) - time()) / 3600) < 12)
                    <div id="timer" class="wrap-countdown time-countdown" data-expire="{{ Carbon\Carbon::parse($item->end_date) }}"></div>
                @else
                    {{ $date->diff($now)->format("Ends in %dD %hH %iM"); }}
                |   {{ Carbon\Carbon::parse($item->end_date)->format('l H:i') }}
                @endif
              </h6>
          </div>
          <form enctype="multipart/form-data" method="POST" action="{{route('update-price', array($item->id))}}">
            @csrf
            <div class="card-footer form-group">
              <div class="pt-2 half">
                <h5>Place a bid, €:</h5>
                  <input id="demo"  type="number" name="bid_amount" placeholder="Bid amount" step="0.01" min="{{$item->min_bid + $item->price}}">
                  <button id="demo2" " class="button btn-sm btn-dark text-right" type="submit">Place bid</button>
              </div>
              <div class="half">
                <h6>Seller:</h6>
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg>
                </span> 
                <a href="/user/{{$seller->id}}" class="link-dark">{{$seller->name}} ( {{$count}} )</a>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>    
  </div>
  <script>
    const status = document.getElementById('status');
    if (status.textContent.includes('Auction Has Ended')) {
      document.getElementById('demo').disabled = true;
      document.getElementById('demo2').disabled = true;
    }
  </script>
@include('layout.timer')
@endsection
@extends('layout.bid')