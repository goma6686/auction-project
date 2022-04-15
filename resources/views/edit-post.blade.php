@extends('layout.app')
@section('content')
<div class="py-12">
    <h1 class="latest text-center mb-2">Edit Auction Post</h1>
    {{ Html::ul($errors->all()) }}
    <div class="max-w-7xl sm:px-6 lg:px-8 p-5">
        <label>Cover image</label>
        @if ($item->cover != null)
        <form action="/profile/removeImage/{{ $item->id }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-outline-danger" > Delete cover
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
            </button>
        </form>
        @endif
        <form enctype="multipart/form-data" method="POST" action="{{route('update-post', array($item->id))}}">
            @csrf
            <div class="form-group pt-2">
            <input type="file" name="cover" id="cover">
            @error('cover')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            @if ($item->cover != null)
                <br><img class="img-fluid mt-2"  src="/images/{{ ($item->cover) }}" width="230">
            @endif
        </div>
            <div class="form-group pt-4">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
            </div>
            <div class="form-group pt-4">
                <label for="description">Description</label>
                <textarea name="description" type="text" rows="5" class="form-control">{{ $item->description }}</textarea>
            </div>
            <div class="form-group pt-4">
                <label for="min_bid">Minimal bid:</label><br>
                <input type="number" name="min_bid" placeholder="1.0" step="0.01" min="0.1" value="{{ $item->min_bid }}">
            </div>
            <div class="form-group pt-4">
                <label for="datemin">Enter auction end date and time: (after {{ \Carbon\Carbon::now()->toDateString() }})</label><br>
                <input  type="datetime-local" name="end_date" value="{{ $item->end_date }}"required>
            </div>
            <div class="form-group pt-4">
                <div class="col-md-2">
                <label for="condition">Condition</label>
                <select class="form-control" name="condition_id" type="condition_id" required>
                        @foreach($conditions as $condition)
                        <option value="{{ $condition->id }}" @if ($item->condition_id == $condition->id) selected @endif> {{$condition->name}} </option>
                        @endforeach
                </select>
                </div>
            </div>
            <div class="form-check pt-4">
            <label for="is_active">Active?</label>
            <input class="form-check-input" type="checkbox" @if ($item->is_active == 1) @checked(true) @endif value="{{$item->is_active}}" name="is_active">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    config = {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
    }

    flatpickr("input[type=datetime-local]", config);
</script>
@endsection
