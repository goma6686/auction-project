@extends('layout.app')
@section('content')
<div class="container">
    <h3 class="text-center mb-2">Conditions</h3>
    <div class="row">
            <div class="card mx-auto border-dark justify-content-center">
                <div class="mx-auto">
                    @include('admin.conditionTable')
                </div>
            </div>
    </div>
</div>
<script>
    @if(session()->has('error'))
      Swal.fire('{{session()->get('error')}}')
    @endif
</script>
@endsection