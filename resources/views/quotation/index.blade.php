@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4><i class="fa-solid fa-list"></i> Quotes</h4>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
            </div>
            <div class="col-md-4 text-end">
                <!--{!! $quotations->links() !!}-->
                <a href="{{ route('quotation.create') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add new</a>
            </div>
        </div>
        <hr>
<table class="table table-hover table-striped table-sm">
    <thead>
        <tr class="table-secondary align-middle">
            <th class="searchable">Quote name</th>
            <th class="searchable">Client</th>
            <th class="searchable">Description</th>
            <th class="searchable">Date</th>
            <th class="text-center text-nowrap">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($quotations as $quotation)
        <tr>
            <td>
                <a href="{{ route('quotation.details.index', $quotation) }}">{{ $quotation->name }}</a>
            </td>
            <td>{{ $quotation->client->name }}</td>
            <td>{{ $quotation->description }}</td>
            <td>{{ $quotation->date }}</td>
            <td class="text-center">
                <form action="{{ route('quotation.destroy', $quotation) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



    </div>
@endsection


