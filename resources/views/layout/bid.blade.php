@section('js')
<script>
Pusher.logToConsole = true;
var pusher = new Pusher('a0706e146a7f37674961', {
  cluster: 'eu'
});

var channel = pusher.subscribe('Bids');
channel.bind('pusher:subscription_succeeded', function(members) {
    //alert('successfully subscribed!');
 });

channel.bind('App\\Events\\BidPlaced', function(data) {
  const element = document.getElementById("p1");
  const p_element = document.getElementById("price");
  
  var obj = data;
  obj.toJSON = function(){
    return {
      bidder_count: data.bidder_count,
      price: data.price
    }
  }

  element.innerHTML = JSON.stringify(obj.bidder_count);
  p_element.innerHTML = JSON.stringify(obj.price);
});
</script>
@endsection