@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ route('quotation.update', $quotation) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('quotation.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
