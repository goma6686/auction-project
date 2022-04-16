@extends('layout.app')
@section('content')
<div class="container-xxl">
  <div class="row">
    <div class="col">
      <div class="card p-3 border-dark">
          <img @if ($item->cover != null) src="/images/{{ ($item->cover) }}" @else src="https://2.bp.blogspot.com/-muVbmju-gkA/Vir94NirTeI/AAAAAAAAT9c/VoHzHZzQmR4/s580/placeholder-image.jpg" @endif class="card-img-top" style="align-self: center;" width="23">
        <div class="card-body">
          <h3 class="text-center">Description</h3>
          <h6 class="card-footer p-3">{{ $item->description }}</h5>
        </div>
      </div>
    </div>
    <div class="col-7">
      <h3 class="mt-4 text-center">{{ $item->title }}</h3>
      <div class="card p-3 border-dark">
        <div class="card-body">
          <div class="text-left">
            <h6>
              <b>Condition:</b> 
              @foreach($conditions as $condition)
              @if($condition->id == $item->condition_id) 
                  {{$condition->name}}
              @endif 
            @endforeach
            </h6>
            <h6>
              <b>Current bids:</b>
              {{$item->bidder_count}}
            </h6>
            <h6>
              @php    
                $date = new DateTime($item->end_date);
                $now = new DateTime(\Carbon\Carbon::now());
              @endphp
              @if ($date < $now)
              <b>Auction Has Ended</b>
              @elseif ($now->diff($date)->format("%H") < 1)
                <div>
                  <div class="wrap-countdown time-countdown" data-expire="{{ Carbon\Carbon::parse($item->end_date)->format('Y/m/d H:i:s') }}"></div>
                </div>
              @else
              <b>Time left:</b>
                {{ $date->diff($now)->format("%dD %hH %iM"); }}
              @endif
            </h6>
          </div>
        </div>
        <div class="card-footer" id="two-cols">
            <div class="text-left pt-2" id="left-item">
              <h5>Current bid:</h5>
                <p class="text-left">{{$item->price}}€</p>
              <div class="form-group">
                <input type="number" name="bid" placeholder="Bid amount" step="0.01" min="">
                <p class="text-muted text-right">Enter {{$item->min_bid}} or more</p>
            </div>
            </div>
            <div id="right-item"><br>
              <h5>Current bid:</h5>
                <p>{{$item->price}}</p>
              <button class="btn btn-dark text-right">Place bid</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layout.timer')
@endsection