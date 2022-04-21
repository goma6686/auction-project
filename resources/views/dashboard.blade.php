@extends('layout.app')
@section('content')
<div class="container-sm">
    <div class="d-flex">
        <div class="nav flex-column nav-pills me-3 align-items-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">All Items</button>
          <button class="nav-link " id="v-pills-soon-tab" data-bs-toggle="pill" data-bs-target="#v-pills-soon" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ending Soon</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($items as $item)
                    @if ($item->is_active == 1)
                    <div class="col">
                        @include('layout.card')
                      </div>
                    @endif
                @endforeach
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-soon" role="tabpanel" aria-labelledby="v-pills-soon-tab">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @php
                $counter=0;
                @endphp
                @foreach ($items as $item)
                    @if ($item->is_active == 1)
                        @php    
                            $date = new DateTime($item->end_date);
                            $now = new DateTime(\Carbon\Carbon::now());
                            $diff = $now->diff($date);
                            $hours = $diff->h;
                            $hours = $hours + ($diff->days*24);
                        @endphp
                        @if ($hours < 12)
                            $counter++;
                            <div class="col">
                            @include('layout.card')
                        @endif
                    @endif
                @endforeach
                @if($counter == 0)
                 No Auctions are ending soon yet
                @endif
            </div>
        </div>
    </div>
</div>
@include('layout.timer')
@endsection