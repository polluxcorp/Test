<h1>{{ $mode }} Weld</h1>
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
    <label for="weldtype">Weld Name</label>
    <input type="text" name="weldtype" class="form-control" value="{{ isset($weldData->weldtype) ? $weldData->weldtype: old('weldtype') }}">
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" name="price" value="{{ isset($weldData->price) ? $weldData->price: old('price') }}">
</div>
<br>
<input type="submit" class="btn btn-success" value="{{ $mode }} weld">
    <a class="btn btn-primary" href="{{ url('weld/') }}">Return</a>

