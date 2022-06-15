@extends('layout.app')
@section('content')
<div class="container">
    <div class="tm-md-12 tm-sm-12">
            <div class="card p-3 border-dark">
                <h3 class="card-title text-center">Items</h3>
                <div class="card-body">
                    @if(isset($items))
                        @include('admin.table')
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('create-post') }}" class="btn btn-dark">Add New Item</a>
                </div>
            </div>
    </div>
</div>
@endsection