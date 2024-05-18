@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ url('/process/' . $process->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('process.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
