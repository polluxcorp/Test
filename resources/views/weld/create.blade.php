@extends('layouts.app')

@section('content')
    <div class="container">
<br>
<form action="{{ url('/weld') }}" method="post">
    @csrf
    @include('weld.form', ['mode'=>'Create'])

</form>
    </div>
@endsection
