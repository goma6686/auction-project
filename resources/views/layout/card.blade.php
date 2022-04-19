<div class="card">
    <img class="card-img-top" style="object-fit:fit" @if ($item->cover != null) src="/images/{{ ($item->cover) }}" @else src="https://bit.ly/3vrnLpm" @endif >
  <div class="card-body">
    <h5 class="card-title text-center">{{ $item->title }}</h5>
    <div id="two-cols">
        <div id="left-item">
            <p class="card-text">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
                <span>
                    Total Bidders: {{ $item->bidder_count }}
                </span>
            </p>
            <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
            <span>
                Condition: 
                @foreach($conditions as $condition)
                    @if($condition->id == $item->condition_id) 
                        {{$condition->name}}
                    @endif 
                @endforeach
            </span>
        </div>
        <div id="right-item" class="text-right">
            <span><br>
                <h5>Price: {{ $item->price }} €</h5>
            </span>
        </div>
    </div>
  </div>
  <div class="card-footer" id="two-cols">
    <div id="left-item">
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
    </div>
    <div id="right-item">
        <a href="/item/{{$item->id}}" role="button" class="btn btn-sm btn-light">See more</a>
    </div>
  </div>
</div>