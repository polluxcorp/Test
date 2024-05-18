@extends('layouts.app')

@section('content')
    <div class="container">

            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                </button>
            </div>
            @endif
<a href="{{ url('/process/create') }}" class="btn btn-success">Add a new process</a>
    <br>
    <br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Process Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($processes as $process)
        <tr>
            <td>{{ $process->id }}</td>
            <td>{{ $process->processname }}</td>
            <td>$ {{ $process->price }}</td>

            <td>
                <a href="{{ url('/process/' . $process->id . '/edit') }}" class="btn btn-warning">Edit</a>


                <form action="{{ url('/process/'.$process->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
        {!! $processes->links() !!}
    </div>
@endsection
