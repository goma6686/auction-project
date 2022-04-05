@extends('layout.app')
@section('content')
<div class="py-12">
    <h1 class="latest text-center mb-2">Create Auction Post</h1>
    {{ Html::ul($errors->all()) }}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200">
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
                            <div class="form-group">
                                <div class="col-md-2">
                                  <label for="description">Condition</label>
                                  <select class="form-control" required>
                                        @foreach($conditions as $condition)
                                               {{--
                                                <option value="{{ $condition->id }}" @if($condition->id == $items->condition_id) selected @endif> {{$condition->name}} </option>
                                                --}}
                                                <option value="{{ $condition->id }}" > {{$condition->name}} </option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        </div>
        {{ Form::open(array('url' => 'items')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Request::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('min_bid', 'minimum bid') }}
        {{ Form::select('min_bid', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Request::old('min_bid'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the item!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

    </div>
</div>
@endsection