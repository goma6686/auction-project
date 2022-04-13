@extends('layout.app')
@section('content')
<link href = "{{asset('css/profile.css')}}" rel = "stylesheet">
<div class="container">
    <div class="row">
        <div class="col">
           <div id="content" class="content content-full-width">
              <div class="profile">
                 <div class="profile-header">
                    <!-- BEGIN profile-header-cover -->
                    <div class="profile-header-cover"></div>
                    <!-- END profile-header-cover -->
                    <!-- BEGIN profile-header-content -->
                    <div class="profile-header-content">
                       <!-- BEGIN profile-header-img -->
                       <div class="profile-header-img">
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReMZX2wlBguwnabKRRtHGtsmUPuOQW50dRPA&usqp=CAU" alt="">
                       </div>
                       <!-- END profile-header-img -->
                       <!-- BEGIN profile-header-info -->
                       <div class="profile-header-info">
                          <h4 class="m-t-10 m-b-5">{{ Auth::user()->name }}</h4>
                          <p class="m-b-10">{{ Auth::user()->email }}</p>
                       </div>
                       <!-- END profile-header-info -->
                    </div>
                    <!-- END profile-header-content -->
              </div>
              <!-- begin profile-content -->
              <div class="profile-content">
                 <!-- begin tab-content -->
                 <div class="tab-content">
                    <!-- begin #profile-items tab -->
                    <div class="tab-pane fade active show mt-3" id="profile-items">
                     <div class="btn-group" role="group">
                        <a href="{{ route('create-post') }}" role="button" class="btn btn-outline-dark">Add Item</a>
                        <a role="button" class="btn btn-outline-dark">???</a>
                      </div>
                      @include('layout.table')
                       <!-- end timeline -->
                       {!! $items->links() !!}
                    </div>
                    <!-- end #profile-post tab -->
                 </div>
                 <!-- end tab-content -->
              </div>
              <!-- end profile-content -->
           </div>
        </div>
     </div>
</div>
@endsection