@extends('layout.app')
@section('content')
<div class="container">
    <!-- row -->
    <div class="row tm-content-row">
        <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
            <div class="card p-3 border-dark">
                <h3 class="card-title text-center">Items</h3>
                <div class="card-body">
                    @include('admin.table')
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('create-post') }}" class="btn btn-dark">Add New Item</a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
            <div class="bg-white tm-block h-100">
                <div class="card p-3 border-dark">
                    <h3 class="card-title text-center">Conditions</h3>
                    <div class="card-body">
                        @include('admin.conditionTable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection