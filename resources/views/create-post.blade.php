@extends('layout.app')
@section('content')
<div class="py-12">
    <h1 class="latest text-center mb-2">Create Auction Post</h1>
    {{ Html::ul($errors->all()) }}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="/profile">
                 @csrf
                  <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required="">
                    </div>
                    <div class="form-group pt-4">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group pt-4">
                        <label for="min_bid">Minimal bid:</label><br>
                        <input type="number" name="min_bid" placeholder="1.0" step="0.01" min="0.1" >
                    </div>
                    <div class="form-group pt-4">
                        <label for="datemin">Enter auction end date and time: (after {{ \Carbon\Carbon::now()->toDateString() }})</label><br>
                        <input  type="datetime-local" name="end_date" required>
                    </div>
                    <div class="form-group pt-4">
                        <div class="col-md-2">
                        <label for="condition">Condition</label>
                        <select class="form-control" name="condition_id" type="condition_id" required>
                                @foreach($conditions as $condition)
                                    <option value="{{ $condition->id }}" selected > {{$condition->name}} </option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                  <div class="form-check pt-4">
                    <label for="is_active">Active</label>
                    <input class="form-check-input" type="checkbox" value="0" name="is_active">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  
                </form>
              </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    config = {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "\Carbon\Carbon::now()->toDateString()",
    }

    flatpickr("input[type=datetime-local]", config);
</script>
@endsection