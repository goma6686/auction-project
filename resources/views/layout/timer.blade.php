<script >
// Set the date we're counting down to
var countDownDate = new Date($(".time-countdown").data('expire')).getTime();
var now = new Date().getTime();
var distance = countDownDate - now;

// Update the count down every 1 second
setInterval(function() {

   // Get today's date and time
   var now = new Date().getTime();

   // Find the distance between now and the count down date
   var distance = countDownDate - now;
   // Time calculations
   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
   
   // Output the result in an element with id="timer"
   var timer = document.getElementById("timer") ?? 0;
   timer.innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

   // If the count down is over, write some text 
   if (distance < 0) {
      clearInterval();
      location.reload();

   }
}, 1000); //1000 = 1 sec


</script>