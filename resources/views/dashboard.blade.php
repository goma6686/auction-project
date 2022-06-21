@extends('layout.app')
@section('content')
<div class="container">
    <div class="d-flex">
        <div class="nav flex-column nav-pills me-3 align-items-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">All Items</button>
          <button class="nav-link " id="v-pills-soon-tab" data-bs-toggle="pill" data-bs-target="#v-pills-soon" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ending Soon</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
        <!--
        <div class="row">
            <div class="col-4">
                <div class="list-group" id="myList" role="tablist">
                    @foreach($conditions as $condition)
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">Home</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">Profile</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab">Messages</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#settings" role="tab">Settings</a>
                    @endforeach
                  </div>
            </div>
            <div class="col-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">a</div>
                    <div class="tab-pane" id="profile" role="tabpanel">b</div>
                    <div class="tab-pane" id="messages" role="tabpanel">c</div>
                    <div class="tab-pane" id="settings" role="tabpanel">...</div>
                </div>
          </div>
        -->
        <!--<input type="search" placeholder="Search.." name="search" class="form-control" onkeyup="buttonUp();">-->
          <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-3 gy-3 row-cols-2 row-cols-md-3 row-cols-xl-3">
                    @foreach ($items as $item)
                        @if ($item->is_active == 1)
                            <div class="col" id="myTable">
                                @include('layout.card')
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-soon" role="tabpanel" aria-labelledby="v-pills-soon-tab">
          <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-3 gy-3 row-cols-2 row-cols-md-3 row-cols-xl-3">
                @php
                $counter=0;
                @endphp
                @foreach ($items as $item)
                    @if ($item->is_active == 1)
                        @if (round((strtotime($item->end_date) - time()) / 3600) < 12)
                            @php
                                $counter++;
                            @endphp
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
<script>
$('#myList a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
@include('layout.search')
@endsection