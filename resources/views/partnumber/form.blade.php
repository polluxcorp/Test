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
        <h4><i class="fa-solid fa-layer-group"></i> {{ $mode }} Part Number</h4>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="sheetname">Sheet Name</label>
                    <input type="text" name="sheetname" class="form-control" value="{{ isset($partnumber->sheetname) ? $partnumber->sheetname: old('sheetname') }}">
                </div>
                <div class="col-md-4">
                    <label for="partnumber">Part Number</label>
                    <input type="text" class="form-control" name="partnumber" value="{{ isset($partnumber->partnumber) ? $partnumber->partnumber: old('partnumber') }}">
                </div>
                <div class="col-md-4">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ isset($partnumber->description) ? $partnumber->description: old('description') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="weight">Weight</label>
                    <input type="number" class="form-control" name="weight" value="{{ isset($partnumber->weight) ? $partnumber->weight : old('weight') }}" step="0.01">
                </div>
                <div class="col-md-4">
                    <label for="width">Width</label>
                    <input type="number" class="form-control" name="width" value="{{ isset($partnumber->width) ? $partnumber->width : old('width') }}" step="0.01">
                </div>
                <div class="col-md-4">
                    <label for="length">Length / Inches</label>
                    <input type="number" class="form-control" name="length" value="{{ isset($partnumber->length) ? $partnumber->length: old('length') }}" step="0.01">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="unitmeasure">Unit Measure</label>
                    <select name="unitmeasure" class="form-select" id="unitmeasure">
                        <option value="units" {{ isset($partnumber->unitmeasure) && $partnumber->unitmeasure == 'units' ? 'selected' : (old('unitmeasure') == 'units' ? 'selected' : '') }}>Units</option>
                        <option value="inches" {{ isset($partnumber->unitmeasure) && $partnumber->unitmeasure == 'inches' ? 'selected' : (old('unitmeasure') == 'inches' ? 'selected' : '') }}>Inches</option>
                        <option value="pounds" {{ isset($partnumber->unitmeasure) && $partnumber->unitmeasure == 'pounds' ? 'selected' : (old('unitmeasure') == 'pounds' ? 'selected' : '') }}>Pounds</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" value="{{ isset($partnumber->price) ? $partnumber->price: old('price') }}" step="0.01">
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer text-end">
        <button type="submit" class="btn btn-sm btn-primary" value="Save"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        <a class="btn btn-sm btn-secondary" href="{{ route('partnumber.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>
