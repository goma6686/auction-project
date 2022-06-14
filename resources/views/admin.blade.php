@extends('layout.app')
@section('content')
<div class="container-sm">
    <div class="d-flex">
        <div class="nav flex-column nav-pills me-3 align-items-start" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">All Items</button>
          <button class="nav-link" id="v-pills-user-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user" type="button" role="tab" aria-controls="v-pills-user" aria-selected="true">All Users</button>
          <button class="nav-link" id="v-pills-soon-tab" data-bs-toggle="pill" data-bs-target="#v-pills-soon" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Categories</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="container px-4 px-lg-5 mt-2">
                    @if (isset($items))
                        @include('layout.table')
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @if (isset($data))
                        @include('layout.u_table')
                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-soon" role="tabpanel" aria-labelledby="v-pills-soon-tab">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                        ???
                </div>
            </div>
        </div>
    </div>
</div>
@endsection