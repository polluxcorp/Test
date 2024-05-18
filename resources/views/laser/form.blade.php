<h1>{{ $mode }} Laser Cut</h1>
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
    <label for="lasertype">Laser Cut Name</label>
    <input type="text" class="form-control" name="lasertype" value="{{ isset($laserData->lasertype) ? $laserData->lasertype: old('lasertype') }}">
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" name="price" value="{{ isset($laserData->price) ? $laserData->price: old('price') }}">
</div>
<br>
<input type="submit" class="btn btn-success" value="{{ $mode }} laser">
    <a class="btn btn-primary" href="{{ url('laser/') }}">Return</a>

