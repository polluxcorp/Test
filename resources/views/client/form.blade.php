
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <h4 class="cart-title"><i class="fa-solid fa-user-tie"></i> {{ $mode }} Customer</h4>
    </div>
    <div class="card-body">
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="name">Customer alias</label>
            <input type="text" name="name" class="form-control" value="{{ isset($client->name) ? $client->name: old('name') }}">
        </div>
        <div class="col-md-4">
            <label for="real_name">Customer real name</label>
            <input type="text" name="real_name" class="form-control" value="{{ isset($client->real_name) ? $client->real_name: old('real_name') }}">
        </div>
        <div class="col-md-4">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ isset($client->description) ? $client->description: old('description') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="notes">Notes</label>
            <textarea type="text" name="notes" class="form-control">{{ isset($client->notes) ? $client->notes: old('notes') }}</textarea>
        </div>

    </div>
</div>
</div>
<br>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-sm btn-primary" value="Save"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        <a class="btn btn-sm btn-secondary" href="{{ route('client.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>
