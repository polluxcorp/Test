@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ route('client.update', $client) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('client.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
