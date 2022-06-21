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
                              <img  
                              @if ($user->avatar == null) 
                                 src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReMZX2wlBguwnabKRRtHGtsmUPuOQW50dRPA&usqp=CAU"
                              @else
                                 src="/images/avatars/{{ ($user->avatar) }}"
                              @endif alt="avatar">
                       </div>
                       <!-- END profile-header-img -->
                       <!-- BEGIN profile-header-info -->
                       <div class="profile-header-info">
                          <h4 class="m-t-10 m-b-5">{{ $user->name }}</h4>
                          <p class="m-b-10">{{ $user->email }}</p>
                          @if(Auth::user()->id == $user->id && Auth::user()->is_active == 1)
                           <a href="/user/edit/{{ $user->id }}" class="btn btn-dark " role="button">Edit Profile</a>
                           <a href="{{ route('create-post') }}" role="button" class="btn btn-dark">Add Item</a>
                           <a href="/user/{{ $user->id }}/list" role="button" class="btn btn-dark">Items Won</a>
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
                        @if($user->is_active)
                           @if (isset($items))
                              @if(Auth::user()->id == $user->id)
                                 @include('layout.table')
                              @else
                                 <div class="container px-4 px-lg-5 mt-5">
                                    <div class="row gx-3 gy-3 row-cols-2 row-cols-md-3 row-cols-xl-3">
                                       @if ($count > 0) <!-- jei daugiau nei 0 aktyviu -->
                                          @foreach ($items as $item)
                                             @if ($item->is_active == 1)
                                                   @include('layout.card')
                                             @endif
                                          @endforeach
                                       @else
                                          <div class="container px-4 px-lg-5 mt-5">
                                             <h3 style="text-align: center;">No items found :(</h3>
                                          </div>
                                       @endif
                                    </div>
                                 </div>
                              @endif
                           @endif
                        @elseif(Auth::user()->id == $user->id)
                           <div class="container px-4 px-lg-5 mt-5">
                              <h3 style="text-align: center;">Your account has been deactivated:(</h3>
                           </div>
                        @elseif(Auth::user()->id != $user->id)
                           <div class="container px-4 px-lg-5 mt-5">
                              <h3 style="text-align: center;">This account has been deactivated:(</h3>
                           </div>
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