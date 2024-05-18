@extends('layouts.app')

@section('content')
    <div class="container">
<br>
<form action="{{ url('/process') }}" method="post">
    @csrf
    @include('process.form', ['mode'=>'Create'])

</form>
    </div>
@endsection
