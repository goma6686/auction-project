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
                    <div class="row items-row">
                        @forelse($items as $item) 
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                                <div class="card">
                                    <img class="card-img-top item-thumbnail" src=" {{ asset($item->cover) }} "
                                         alt="{{ $item->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title item-title">{{ $item->name }} </h5>
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
                                            <span>Min Bid: {{ $item->min_bid }} </span>
                                        </p>
                                        <p class="text-muted">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                              d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                                    </svg>
                                                </span>
                                            <span>
                                                    Total Bidders: {{ $item->bidder_count }} {{-- {{ $item->bids()->count() }} --}}
                                                </span>
                                        </p>
                                        {{-- <a href="{{ route('item.show', ['item' => $item->id]) }}"
                                           class="w-100 btn btn-primary">Bid
                                            Now</a> --}}
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
