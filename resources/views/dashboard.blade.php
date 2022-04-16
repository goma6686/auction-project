@extends('layout.app')
@section('content')
<div class="container-xxl">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">All Items</button>
          <button class="nav-link " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ending Soon</button>
          <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">???</button>
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
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="row row-cols-1 row-cols-md-2 g-4">
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
                            <div class="col">
                                @include('layout.card')
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">..c.</div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
        </div>
    </div>
</div>
@include('layout.timer')
@endsection