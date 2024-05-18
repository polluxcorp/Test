@extends('layouts.app')

@section('content')
    <div class="container">
<br>
<form action="{{ route('client.store') }}" method="post">
    @csrf
    @include('client.form', ['mode'=>'Create'])

</form>
    </div>
@endsection
