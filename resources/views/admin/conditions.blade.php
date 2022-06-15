@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="card mx-auto border-dark justify-content-center">
                <div class="mx-auto">
                    @include('admin.conditionTable')
                </div>
            </div>
    </div>
</div>
@endsection