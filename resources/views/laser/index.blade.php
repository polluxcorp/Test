@extends('layouts.app')

@section('content')
    <div class="container">
<a href="{{ url('/laser/create') }}" class="btn btn-success">Add a new Laser Cut</a>
    <br>
    <br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Laser Cut</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($laserData as $laser)
        <tr>
            <td>{{ $laser->id }}</td>
            <td>{{ $laser->lasertype }}</td>
            <td>$ {{ $laser->price }}</td>

            <td>
                <a href="{{ url('/laser/' . $laser->id . '/edit') }}" class="btn btn-warning">Edit</a>


                <form action="{{ url('/laser/'.$laser->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

    </div>
@endsection
