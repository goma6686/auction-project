@extends('layout.app')
@section('content')
<div class="py-12">
    <h1 class="latest text-center mb-2">Create Auction Post</h1>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
            <div class="card-body">
                <form name="add-blog-post-form" enctype="multipart/form-data" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
                 @csrf
                  <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" id="name" name="name" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required=""></textarea>
                  </div>
                  <div class="py-2">
                            <div>
                                <div class="col-md-2">
                                    <select class="form-control" required>
                                        <option value="">condition</option>
                                        <option value=""> New </option>
                                        <option value=""> Used </option>
                                    </select>
                                </div>
                            </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection