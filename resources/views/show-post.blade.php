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
              <h5 class="elem">
                <div>Current bids:</div>
                <div class="dots"></div>
                <div id="p1">{{ $item->bidder_count }}</div>
              </h5>
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
              <h5 class="text-center">
              @php    
                $date = new DateTime($item->end_date);
                $now = new DateTime(\Carbon\Carbon::now());
                $diff = $now->diff($date);
                $hours = $diff->h;
                $hours = $hours + ($diff->days*24);
              @endphp
              @if ($date <= $now)
                <b>Auction Has Ended</b>
              @elseif ($hours < 1)
              <div>
                  <div class="wrap-countdown time-countdown" data-expire="{{ Carbon\Carbon::parse($item->end_date)->format('Y/m/d H:i:s') }}"></div>
              </div>
              @else
                  {{ $date->diff($now)->format("Ends in %dD %hH %iM"); }}
              @endif
              |   {{ Carbon\Carbon::parse($item->end_date)->format('l H:i') }}
              </h5>
          </div>
          <form enctype="multipart/form-data" method="POST" action="{{route('update-price', array($item->id))}}">
            @csrf
            <div class="card-footer form-group">
              <div class="pt-2 half">
                <h5>Place a bid, €:</h5>
                  <input type="number" name="bid_amount" placeholder="Bid amount" step="0.01" min="{{$item->min_bid + $item->price}}">
                  <button class="btn-sm btn-dark text-right" type="submit">Place bid</button>
              </div>
              <div class="half">
                <h6>Seller:</h6>
                  <a href="#" class="link-dark">{{$seller->name}} </a>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>    
  </div>
@endsection
@extends('layout.bid')