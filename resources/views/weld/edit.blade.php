@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ url('/weld/' . $weldData->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('weld.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
