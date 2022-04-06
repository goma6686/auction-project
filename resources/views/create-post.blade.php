@extends('layout.app')
@section('content')
<div class="py-12">
    <h1 class="latest text-center mb-2">Create Auction Post</h1>
    {{ Html::ul($errors->all()) }}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="/profile">
                 @csrf
                  <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="title" name="title" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" required=""></textarea>
                    </div>
                    <div class="py-2">
                                <div class="form-group">
                                    <div class="col-md-2">
                                    <label for="condition">Condition</label>
                                    <select class="form-control" required>
                                            @foreach($conditions as $condition)
                                                    <option value="{{ $condition->id }}" @if($condition->id == $items->condition_id) selected @endif> {{$condition->name}} </option>
                                            @endforeach
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