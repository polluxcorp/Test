@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4><i class="fa-solid fa-user-tie"></i> Customers</h4>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('client.create') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add new</a>
                </div>
            </div>
        <hr>
<table class="table table-striped table-hover table-sm">
    <thead>
        <tr class="table-secondary align-middle">
            <th class="searchable">Customer Alias</th>
            <th class="searchable">Customer Real Name</th>
            <th class="searchable">Description</th>
            <th class="searchable">Notes</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->real_name }}</td>
            <td>{{ $client->description }}</td>
            <td>{{ $client->notes }}</td>
            <td class="text-center">
                <a href="{{ route('client.edit', $client) }}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route('client.destroy', $client) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
        <!--<div class="row">
            <div class="col text-end">

            </div>
        </div>
    </div>-->
@endsection
