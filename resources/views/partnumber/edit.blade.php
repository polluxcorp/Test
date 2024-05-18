@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ route('partnumber.update', $partnumber) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('partnumber.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
