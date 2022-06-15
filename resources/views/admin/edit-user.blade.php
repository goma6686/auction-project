@extends('layout.app')
@section('content')
<div class="py-12">
    <h1 class="latest text-center mb-2">Edit User</h1>
    {{ Html::ul($errors->all()) }}
    <div class="max-w-5md sm:px-6 lg:px-8 p-5">
        <label>avatar image</label>
        @if ($user->avatar != null)
        <form action="/user/removeImage/{{ $user->id }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-outline-danger" > Delete avatar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
            </button>
        </form>
        @endif
        <form enctype="multipart/form-data" method="POST" action="{{route('update-user', array($user->id))}}">
            @csrf
            <div class="form-group pt-2">
            <input type="file" name="avatar" id="avatar">
            @error('avatar')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            @if ($user->avatar != null)
                <br><img class="img-fluid mt-2"  src="/images/{{ ($user->avatar) }}" width="230">
            @endif
        </div>
            <div class="form-group pt-4">
                <label>Name</label>
                <input type="text" name="title" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group pt-4">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            @if(auth()->check() && Auth::user()->is_admin)
                <div class="form-check pt-4">
                <label for="is_active">Active?</label>
                <input class="form-check-input" type="checkbox" @if ($user->is_active == 1) @checked(true) @endif value="{{$user->is_active}}" name="is_active">
                </div>
            @endif
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
