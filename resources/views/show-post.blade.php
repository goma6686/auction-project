@extends('layout.app')
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
        <!--<form enctype="multipart/form-data" method="POST" action="">
          @csrf-->
          <div class="card-footer form-group" id="two-cols">
            <div class="text-left pt-2" id="left-item">
              <h5>Place a bid, €:</h5>
                <input type="number" name="bid_amount" placeholder="Bid amount" step="0.01" min="{{$item->min_bid + $item->price}}" v-model="bidBox">
                  <p class="text-muted text-right">Enter {{$item->min_bid + $item->price}}€ or more</p>
            </div>
            <div id="right-item">
              <h5>Current bid, €:<br> {{$item->price}}</h5>
              <button class="btn btn-dark text-right" @click.prevent="postBid">Place bid</button>
            </div>
          </div>
        <!--</form>-->
        </div>
      </div>
      <div class="mt-4 card p-3 border-dark" v-for="bid in bids">
        <div class="card-body">
          <h5 class="card-heading">@{{bid.user.name}} placed a bid of</h5>
          <p>@{{bid.bid_amount}}</p>
        </div>
      </div> 
    </div>
  </div>
</div>
</div>
@include('layout.timer')
@section('scripts')
<script>
  const app = new Vue({
    el: '#bidding',
    data: {
      bids: {},
      bidBox: '',
      item: {!! $item->toJson() !!},
      user: {!! Auth::user()->toJson() !!}
    },
    mounted(){
      this.getBids();
    },
    methods: {
      getBids(){
        axios.get(`/api/items/${this.item.id}/bids`).then((response) => {
          this.bids = response.data
        }).catch(function(error) {
          console.log(error);
        });
      },
      postBid(){
        axios.post(`/api/items/${this.item.id}/bid`, {
          api_token: this.user.api_token,
          bid_amount: this.bidBox
        }).then((response) => {
          this.bids.unshift(response.data);
          this.bidBox = '';
        }).catch(function(error) {
          console.log(error);
        });
      }
    }
  });
</script>
@endsection
@endsection