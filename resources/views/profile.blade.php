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
                        @if (isset($items))
                        <table class="table table-hover table-striped">
                           <thead>
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
                           </thead>
                            <tbody>
                              @php
                              $counter = 0;
                              @endphp
                              @foreach ($items as $item)
                               @if (Auth::id() == $item->user_id)
                               @php
                                  $counter++;
                               @endphp
                                 <tr scope="row">
                                    <th>{{$counter}}</th>
                                    <td>{{$item->title}}</td>
                                    <td>@if ($item->cover != NULL) 
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                        </svg>
                                        @else 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg>
                                        @endif</td>
                                    <td>{{$item->min_bid}}</td>
                                    @foreach ($conditions as $condition)
                                       @if ($item->condition_id == $condition->id)
                                          <td>{{$condition->name}}</td>
                                       @endif
                                    @endforeach
                                    <td>@if ($item->is_active == 1) 
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                        </svg>
                                       @else 
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg>
                                       @endif</td>
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
                           {!! $items->links() !!}
                          @else
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