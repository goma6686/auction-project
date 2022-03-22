@extends('layout.app')
@section('content')
<div class="py-12">
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
                  <div class="form-group">
                    <label for="condition">Condition</label>
                    <textarea name="condition" class="form-control" required=""></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection