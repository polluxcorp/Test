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
        <h4><i class="fa-solid fa-list"></i> {{ $mode }} Quote</h4>
    </div>
<div class="card-body">
<div class="form-group">
    <div class="row">
        <div class="col-md-5">
            <label for="name">Quote name</label>
            <input type="text" name="name" class="input-group" value="{{ $quotation->name ?? old('name') }}">
        </div>
        <div class="col-md-5">
            <label for="client">Customer</label>
            <select class="form-select select2" name="client_id">
                <option value=""></option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ (isset($quotation->client_id) && $customer->id == $quotation->client_id) ? 'selected' : (old('client_id') == $customer->id ? 'selected' : '') }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="description">Date</label>
            <input type="date" name="date" class="input-group" value="{{ $quotation->date ?? old('date') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" class="input-group" name="description">{{ $quotation->description ?? old('description') }}</textarea>
</div>
</div>
<br>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-sm btn-primary" value="Save"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        <a class="btn btn-sm btn-secondary" href="{{ $backUrl }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>

