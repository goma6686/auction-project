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
                        <ol class="breadcrumb">
                           <a href="#" class="breadcrumb-item">Edit Profile</a>
                           <a href="{{ route('create-post') }}" class="breadcrumb-item">Add item</a>
                        </ol>
                       @php
                       $counter = 0;
                       @endphp
                        <table class="table">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Cover</th>
                                <th scope="col">minBid</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Active</th>
                                <th scope="col">End date</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            <tbody>
                              @foreach ($items as $item)
                               @if (Auth::id() == $item->user_id)
                               @php
                                  $counter++;
                               @endphp
                                 <tr scope="row">
                                    <th>{{$counter}}</th>
                                    <td>{{$item->title}}</td>
                                    <td>@if ($item->cover != NULL) YES @else NO @endif</td>
                                    <td>{{$item->min_bid}}</td>
                                    @foreach ($conditions as $condition)
                                       @if ($item->condition_id == $condition->id)
                                          <td>{{$condition->name}}</td>
                                       @endif
                                    @endforeach
                                    <td>@if ($item->is_active == 1) YES @else NO @endif</td>
                                    <td>{{$item->end_date}}</td>
                                    <td style="text-align: right;">
                                       <a href="/profile/edit/{{$item->id}}" class="btn btn-sm btn-dark " role="button">Edit</a>
                                    </td>
                                    <td>
                                       <form action="/profile/delete/{{$item->id}}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this post?')">Delete</button>
                                       </form>
                                    </td>
                                 </tr>
                               @endif
                              @endforeach
                          </table>
                          @if ($counter == 0)
                                 <h3 style="text-align: center;">No items found :( <br>
                                    <a href="{{ route('create-post') }}" class="btn btn-md btn-outline-dark mt-3 mx-auto">Add one?</a>
                                 </h3>
                          @endif
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