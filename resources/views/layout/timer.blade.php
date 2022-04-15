<script  src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script type="text/javascript">
/*
    $(".time-countdown").countdown($(this).data('expire'),  function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });*/
   ;(function($) {
    var x = {
      init: function(){
         this.time_countdown();
          
      }, 
      time_countdown: function() {
         if($(".time-countdown").length > 0){
                $(".time-countdown").each( function(index, el){
                  $(this).countdown($(this).data('expire'), function(event) {
                        $(this).html( event.strftime('<b>Ends in %M</b> Mins <b>%S</b> Secs'));
                    });
                });
         }
      },
    
   }
      window.onload = function () {
         x.init();
      }
    
      })(window.Zepto || window.jQuery, window, document);
</script>