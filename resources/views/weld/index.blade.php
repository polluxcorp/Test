@extends('layouts.app')

@section('content')
    <div class="container">
<a href="{{ url('/weld/create') }}" class="btn btn-success">Add a new Weld Process</a>
    <br>
    <br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Weld name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($weldData as $weld)
        <tr>
            <td>{{ $weld->id }}</td>
            <td>{{ $weld->weldtype }}</td>
            <td>{{ $weld->price }}</td>
            <td>
                <a href="{{ url('/weld/' . $weld->id . '/edit') }}" class="btn btn-warning">Edit</a>


                <form action="{{ url('/weld/'.$weld->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete the item?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection
