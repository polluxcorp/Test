@extends('layouts.app')

@section('content')
    <div class="container">
<br>
<form action="{{ url('/laser') }}" method="post">
    @csrf
    @include('laser.form', ['mode'=>'Create'])

</form>
    </div>
@endsection
