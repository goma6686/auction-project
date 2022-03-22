@extends('layout.app')
@section('content')
<link href = "{{asset('css/profile.css')}}" rel = "stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                          <a href="#" class="btn btn-sm btn-dark mb-2">Edit Profile</a>
                       </div>
                       <!-- END profile-header-info -->
                    </div>
                    <!-- END profile-header-content -->
                    
              </div>
              <!-- begin profile-content -->
              <div class="profile-content">
                 <!-- begin tab-content -->
                 <div class="tab-content p-0">
                    <!-- begin #profile-items tab -->
                    <div class="tab-pane fade active show" id="profile-items">
                       <div class="row items-row">
                        <p> 
                           <a href="{{ route('post') }}" class="btn btn-sm btn-dark" role="button">Add item</a>
                        </p>
                          
                       </div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">minBid</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>
                                 <a href="#" class="btn btn-sm btn-dark " role="button">Edit</a>
                                 <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                                </td>
                              </tr>
                          </table>
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