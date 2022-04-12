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
                        @if ($item->is_active == 1)
                        <div class="col-md-6 p-2" style="border-style: double;">
                            <div class="row overflow-hidden flex-md-row  position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <h3 class="item-title" style="text-align: center"> {{ $item->title }} </h3>
                                    <p class="text-muted mb-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </span>
                                        <span>
                                            Total Bidders: {{ $item->bidder_count }}
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
                                </div>
                                <div class="col-auto d-lg-block float-right mw-10">
                                    <img class="card-img-top item-thumbnail" @if ($item->cover != null) src="images/{{ ($item->cover) }}" @else src="https://cdn.pixabay.com/photo/2021/08/21/08/09/ban-6562104_960_720.png" @endif width="23" height="250">
                                </div>
                                <div class="card-footer">
                                    <p class="mb-0" style="text-align: center">
                                        Ends in: 
                                        @php    
                                            $date = new DateTime($item->end_date);
                                            $now = new DateTime($item->created_at);
                                        @endphp
                                        {{ $date->diff($now)->format("%dD %hH %iM"); }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                     {{--   {{ $items->appends(request()->except('page'))->links() }} --}}
            </div>
        </div>
    </div>
</section>
@endsection
