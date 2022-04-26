@extends('layout.app')
@section('js')
<script>
  Echo.channel('item-events')
.listen('NewBid', function (event) {
console.log(event);
var action = event.action;
updateItemStats[action](event.itemId);
});
</script>
@endsection
@section('content')
<div id="bidding">
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
            <h5>
              <b>Condition:</b> 
              @foreach($conditions as $condition)
              @if($condition->id == $item->condition_id) 
                  {{$condition->name}}
              @endif 
            @endforeach
            </h5>
            <h5>
              <b>Current bids:</b>
              {{$item->bidder_count}}
            </h5>
            <h5>
              @php    
                $date = new DateTime($item->end_date);
                $now = new DateTime(\Carbon\Carbon::now());
                $diff = $now->diff($date);
                $hours = $diff->h;
                $hours = $hours + ($diff->days*24);
              @endphp
              @if ($date < $now)
              <b>Auction Has Ended</b>
              @elseif ($hours < 1)
                <div>
                  <div class="wrap-countdown time-countdown" data-expire="{{ Carbon\Carbon::parse($item->end_date)->format('Y/m/d H:i:s') }}"></div>
                </div>
              @else
              <b>Time left:</b>
                {{ $date->diff($now)->format("%dD %hH %iM");}}
              @endif
            </h5>
          </div>
        </div>
        <form enctype="multipart/form-data" method="POST" action="{{route('update-price', array($item->id))}}">
          @csrf
          <div class="card-footer form-group" id="two-cols">
            <div class="text-left pt-2" id="left-item">
              <h5>Place a bid, €:</h5>
                <input type="number" name="bid_amount" placeholder="Bid amount" step="0.01" min="{{$item->min_bid + $item->price}}" v-model="bidBox">
                  <p class="text-muted text-right">Enter {{$item->min_bid + $item->price}}€ or more</p>
            </div>
            <div id="right-item">
              <h5>Current bid, €:<br> {{$item->price}}</h5>
              <button onclick="actOnBid(event);" data-item-id="{{ $item->id }}" class="btn btn-dark text-right" >Bid</button>
              <span id="bids-count-{{ $item->id }}">{{ $item->bidder_count }}</span>
            </div>
          </div>
        </form>
        </div>
      </div>
      <div class="mt-4 card p-3 border-dark">
        <div class="card-body">
          <h5 class="card-heading"> placed a bid of</h5>
          <p></p>
        </div>
      </div> 
    </div>
  </div>
</div>
</div>
@include('layout.timer')
    <script>

        var updateItemStats = {
          Bid: function (itemId) {
                document.querySelector('#bids-count-' + itemId).textContent++;
            }
        };
    
        var actOnBid = function (event) {
            var itemId = event.target.dataset.itemId;
            var action = event.target.textContent;
            updateItemStats[action](itemId);
            axios.post('/bids/' + itemId + '/act',
                { action: action });
        };

        
    
    </script>
@endsection