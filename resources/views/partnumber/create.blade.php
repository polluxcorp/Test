@extends('layouts.app')

@section('content')
    <div class="container">
<br>
<form action="{{ route('partnumber.store') }}" method="post">
    @csrf
    @include('partnumber.form', ['mode'=>'Create'])

</form>
    </div>
@endsection
