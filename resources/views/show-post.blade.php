@extends('layout.app')
@section('content')
<div class="container">
  <div class="row">
    <div>
      <div class="middle">
        <h1>COMING SOON</h1>
        <hr>
        <p>
        <div class="wrap-countdown time-countdown" data-expire="{{ Carbon\Carbon::parse($item->end_date)->format('Y/m/d h:i:s') }}"></div>
        <div class="wrap-countdown time-countdown">{{\Carbon\Carbon::now()}}</div>
        <div class="wrap-countdown time-countdown">{{\Carbon\Carbon::parse($item->end_date)}}</div>
        </p>
     </div>
      <div class="card p-3">
        @if($item->cover!=null)
        <img src="/images/{{$item->cover}}" class="card-img-top" style="align-self: center;">
        @endif
        <div class="card-body">
          <h4 class="card-title text-center" style="font-weight: bold;">{{ $item->title }}</h4>
          <h6 class="card-title text-center">{{ $item->description }}</h5>
          <p class="card-text text-center">
            AAAAAAAAAAAAphpAAAAAAAAA
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script>
   ;(function($) {
    var MERCADO_JS = {
      init: function(){
         this.time_countdown();
          
      }, 
      time_countdown: function() {
         if($(".time-countdown").length > 0){
                $(".time-countdown").each( function(index, el){
                  $(this).countdown($(this).data('expire'), function(event) {
                        $(this).html( event.strftime('<span><b>%D</b> Days</span> <span><b>%-H</b> Hrs</span> <span><b>%M</b> Mins</span> <span><b>%S</b> Secs</span>'));
                    });
                });
         }
      },
    
   }
    
      window.onload = function () {
         MERCADO_JS.init();
      }
    
      })(window.Zepto || window.jQuery, window, document);
</script>
@endsection