@extends('layout.app')
@section('content')
<div class="container">
        <div class="tm-md-12 tm-sm-12">
            <div class="card p-3 border-dark">
                <h3 class="card-title text-center">Users</h3>
                <div class="card-body">
                    @include('admin.usersTable')
                </div>
            </div>
        </div>
</div>
@endsection