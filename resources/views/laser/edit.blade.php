@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ url('/laser/' . $laserData->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('laser.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
