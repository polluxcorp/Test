<h1>{{ $mode }} Process</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="processname">Process Name</label>
    <input type="text" name="processname" class="form-control" value="{{ isset($process->processname) ? $process->processname: old('processname') }}">
</div>
<label for="price">Price</label>
<div class="input-group mb-3">

    <span class="input-group-text">$</span>
    <input  class="form-control" name="price" value="{{ isset($process->price) ? $process->price: old('price') }}"></input>
</div>
<br>
<input type="submit" class="btn btn-success" value="{{ $mode }} process">
    <a class="btn btn-primary" href="{{ url('process/') }}">Regresar</a>

