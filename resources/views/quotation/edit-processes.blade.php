@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-secondary">
            <form action="{{ route('quotation.processes', $quotation) }}" method="post">
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3><i class="fa-solid fa-gears"></i> Processes for {{ $quotation->name }}</h3>
                    </div>
                    <div class="col text-end">
                        <a class="btn btn-dark" href="{{ route('quotation.details.index', $quotation) }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach($processesSettings as $key => $values)
                        <h5 class="card-title">{{ $values['name'] }}</h5>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="{{ $key }}">Price</label>
                                <input type="number" name="{{ $key }}" class="form-control" value="{{ number_format(floatval($quotation->{$key} ?? $values['price'] ?? old($key)), 2) }}" step="0.01">
                            </div>
                            <div class="col-md-2">
                                <label for="units">Units</label>
                                <input  class="form-control"  id="units" value="{{ $values['units'] }}" readonly>
                            </div>
                            <div class="col-md-8">
                                <label for="notes">Notes</label>
                                <input class="form-control" id="notes" value="{{ $values['notes'] }}" readonly>
                            </div>
                        </div>
                    <hr>
                @endforeach
            </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a class="btn btn-dark" href="{{ route('quotation.details.index', $quotation) }}">Back</a>
                        </div>
                    </form>
            </div>
    </div>

@endsection
