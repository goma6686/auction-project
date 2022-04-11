@extends('layout.app')

@section('content')
<section class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="latest text-center mb-5">Latest Items</h1>
                    <div class="row sort mb-3 d-flex align-items-center">
                        <div class="col-8">
                            <p class="pt-3 text-muted">{{ request('order') == 'asc' ? 'Sorted price from lower to higher' : 'Sorted price from higher to lower'  }}</p>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($items as $item)
                        <div class="col-md-6 p-2" style="border-style: double;">
                            <div class="row overflow-hidden flex-md-row  position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h3 class="item-title"> {{ $item->title }} </h3>
                                <p class="text-muted mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg>
                                        </span>
                                        <span>
                                            Total Bidders: {{ $item->bidder_count }} {{-- {{ $item->bids()->count() }} --}}
                                        </span>
                                </p>
                                <p class="text-muted">
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
                                </p>
                                <p class="text-muted mb-0">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                                d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                                          <path fill-rule="evenodd"
                                                d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </span>
                                <span>
                                    Ends in: 
                                    @php    
                                        $date = new DateTime($item->end_date);
                                        $now = new DateTime($item->created_at);
                                    @endphp
                                    {{ $date->diff($now)->format("%dD %hH %iM"); }}
                                </span>
                                </p>
                                </div>
                                <div class="col-auto d-lg-block float-right mw-10">
                                    <img class="card-img-top item-thumbnail" src=" {{ asset($item->cover) }} " width="50" height="250">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
    
                     {{--   {{ $items->appends(request()->except('page'))->links() }} --}}
            </div>
        </div>
    </div>
</section>
@endsection
