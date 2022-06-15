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
                          <h4 class="m-t-10 m-b-5">{{ $user->name }}</h4>
                          <p class="m-b-10">{{ $user->email }}</p>
                          @if(Auth::user()->id == $user->id)
                           <a href="/user/edit/{{ $user->id }}" class="btn btn-dark " role="button">Edit Profile</a>
                           <a href="{{ route('create-post') }}" role="button" class="btn btn-dark">Add Item</a>
                          @endif
                          @if (Auth::user()->is_admin && Auth::user()->id == $user->id) 
                              <a href="{{ route('admin') }}" role="button" class="btn btn-dark">Admin Board</a> 
                          @endif
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
                       
                      <div class="container mt-2">
                        @if (isset($items))
                           @include('layout.table')
                        @endif
                      </div>
                       <!-- end timeline -->
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