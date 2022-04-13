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