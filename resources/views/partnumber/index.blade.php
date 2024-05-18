@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-4">
            <h4><i class="fa-solid fa-layer-group"></i> Part number </h4>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
        </div>
        <div class="col text-end">
            <a href="{{ route('partnumber.create') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add new</a>
        </div>
    </div>
    <hr>
    <div class="row mb-3">

    </div>
<table class="table table-light table-hover table-sm  table-striped-columns">
    <thead>
        <tr class="table-secondary">
            <th class="searchable">Sheet name</th>
            <th class="searchable">Part Number</th>
            <th class="searchable">Description</th>
            <th>Weight</th>
            <th class="searchable">Unit Measure</th>
            <th>Width</th>
            <th>Length / Inches</th>
            <th>Area in2</th>
            <th>Per sq inch</th>
            <th class="searchable">Price</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($partnumbers as $partnumber)
        <tr>
            <td>{{ $partnumber->sheetname }}</td>
            <td>{{ $partnumber->partnumber }}</td>
            <td>{{ $partnumber->description }}</td>
            <td>{{ $partnumber->weight }}</td>
            <td>{{ $partnumber->unitmeasure }}</td>
            <td>{{ $partnumber->width }}</td>
            <td>{{ $partnumber->length }}</td>
            <td>{{ $partnumber->getArea() }}</td>
            <td>{{ number_format($partnumber->getPricePerSquareInch(), 2) }}</td>
            <td>{{ number_format($partnumber->price, 2) }}</td>

            <td class="text-center text-nowrap">
                <a href="{{ route('partnumber.edit', $partnumber) }}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route('partnumber.destroy', $partnumber) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



@endsection
