@extends('layouts.app')

@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script defer="defer">
        function quotation_update_price() {
            const form = document.getElementById('quotation-details-form');

            // Verifica si se ha seleccionado un número de parte
            const partNumberSelect = document.querySelector("select[name='part_number_id']");
            const priceInput = document.querySelector("input[name='price']");
            if (!partNumberSelect.value) {
                $('#laser').val('0.00');
                $('#total').text('0.00');
                priceInput.value = ''; // Agrega esta línea
                return;
            }

            const selectedPartNumber = partNumberSelect.options[partNumberSelect.selectedIndex];
            const partNumberPrice = selectedPartNumber.getAttribute('data-price');
            priceInput.value = partNumberPrice;

            $.ajax({
                type: "POST",
                url: form.action + '/calculate',
                data: $(form).serialize(),
                success: function(data) {
                    $('#laser').val(data.laserLength.toFixed(2));
                    const totalAmount = data.amountTotal; // Multiplica el total por el factor
                    $('#total').text(totalAmount.toFixed(2));
                },
                error: function() {
                    $('#laser').val('0.00');
                    $('#total').text('0.00');
                }
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            quotation_update_price();
            const partNumberSelect = document.querySelector("select[name='part_number_id']");
            partNumberSelect.addEventListener('change', function() {
                const selectedPartNumber = partNumberSelect.options[partNumberSelect.selectedIndex];
                quotation_update_price();
            });
        });
    </script>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="card-title">Quote: {{ $quotation->name }} / {{ $quotation->client->name }} </h4>
                    </div>
                </div>
            </div>
            <form id="quotation-details-form" action="{{ route('quotation.details.update', [$quotation, $detail]) }}" method="post">
                @csrf
                <div class="card-body">

                    <input type="hidden" value="" name="quotation_id">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="partnumber">Part number</label>
                            <select name="part_number_id" class="select2">
                                <option value=""></option>
                                @foreach ($partnumbers as $partnumber)
                                    <option value="{{ $partnumber->id }}" data-price="{{ $partnumber->price }}" @if ($partnumber->id == $detail->part_number_id) selected @endif>{{ $partnumber->partnumber }} {{ $partnumber->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="description">Part description</label>
                            <input class="input-group" type="text" name="description" value="{{ $detail->description }}">
                        </div>
                        <div class="col-md-4">
                            <label for="price">Price</label>
                            <input class="input-group" type="number" name="price" value="{{ $detail->price }}" disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-3">
                            <label for="width">Width</label>
                            <input class="input-group" type="number" name="width" step="0.01" value="{{ $detail->width }}">
                        </div>
                        <div class="col-md-3">
                            <label for="length">Length</label>
                            <input class="input-group" type="number" name="length" step="0.01" value="{{ $detail->length }}">
                        </div>
                        <div class="col-md-3">
                            <label for="quantity">Quantity</label>
                            <input class="input-group" type="number" name="quantity" step="1" value="{{ $detail->quantity }}">
                        </div>


                        <div class="col-md-3">
                            <label for="factor">Factor</label>
                            <input class="input-group" type="number" name="factor" step="0.01" value="{{ $detail->factor }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="laser">Laser</label>
                            <input class="input-group" type="number" id="laser" readonly step="0.01" value="{{ $detail->laser }}">
                        </div>
                        <div class="col-md-3">
                            <label for="custom_laser_price">Buy out item</label>
                            <input class="input-group" type="number" name="custom_laser_price" step="0.01" value="{{ $detail->custom_laser_price }}">
                        </div>
                        <div class="col-md-6">
                            <script>
                                function table_hole_form_show()
                                {
                                    $("#hole-form-diameter").val('0.00');
                                    $("#hole-form-quantity").val('1');
                                    $('#hole-form').show();
                                    return false;
                                }

                                function table_hole_form_hide()
                                {
                                    $('#hole-form').hide();
                                    return false;
                                }

                                function table_hole_append()
                                {
                                    const diameter = $("#hole-form-diameter");
                                    const diameterValue = parseFloat(diameter.val());
                                    if (isNaN(diameterValue) || diameterValue < 0.01 || diameterValue > 999.99) {
                                        console.log({diameter, val: diameter.val(), diameterValue});
                                        diameter.focus();
                                        return false;
                                    }

                                    const quantity = $("#hole-form-quantity");
                                    const quantityValue = parseInt(quantity.val(), 10);
                                    if (isNaN(quantityValue) || quantityValue < 1 || quantityValue > 999) {
                                        quantity.focus();
                                        return false;
                                    }

                                    const holesTable = $("#holes-table tbody");
                                    holesTable.append(
                                        $('<tr></tr>').append(
                                            $('<td></td>').append($('<input name="holes_diameter[]" readonly/>').val(diameterValue.toFixed(2))),
                                            $('<td></td>').append($('<input name="holes_quantity[]" readonly/>').val(quantityValue.toFixed(0))),
                                            $('<td></td>').text((3.14 * diameterValue).toFixed(2)),
                                            $('<td></td>').text((3.14 * diameterValue * quantityValue).toFixed(2)),
                                            $('<td></td>').append(
                                                $('<a href="#" class="btn btn-danger btn-sm"><i class="fa-sharp fa-solid fa-xmark"></i></a>').click(function (event) {
                                                    $(event.target).closest('tr').remove();
                                                    quotation_update_price();
                                                    return false;
                                                })
                                            ),
                                        )
                                    );
                                    quotation_update_price();
                                    table_hole_form_hide();
                                    return false;
                                }

                            </script>
                            <table id="holes-table" class="table table-hover table-striped table-sm">
                                <thead class="table-secondary">
                                <tr>
                                    <th>Diameter</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Hole Circum</th>
                                    <th class="text-center">Total Circum</th>
                                    <th class="text-end"><a class="btn btn-secondary btn-sm" href="#" onclick="return table_hole_form_show();"><i class="fa-solid fa-plus"></i></a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($detail->holes as $hole)
                                    <tr>
                                        <td><input name="holes_diameter[]" value="{{ $hole['diameter'] }}" readonly/></td>
                                        <td><input name="holes_quantity[]" value="{{ $hole['quantity'] }}"></td>
                                        <td>{{ number_format($hole['diameter'] * pi(), 2) }}</td>
                                        <td>{{ number_format($hole['diameter'] * $hole['quantity'] * pi(), 2) }}</td>
                                        <td><button type="button" class="btn btn-danger btn-sm" onclick="$(this).closest('tr').remove(); quotation_update_price();"><i class="fa-sharp fa-solid fa-xmark"></i></button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div id="hole-form" class="container" style="display: none">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="hole-form-diameter">Diameter</label>
                                        <input class="form-control" type="number" id="hole-form-diameter" step="0.01">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="hole-form-quantity">Quantity</label>
                                        <input class="form-control" type="number" id="hole-form-quantity">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label for="append">Append</label>
                                        <a class="btn btn-primary" id="append" href="#" onclick="return table_hole_append()"><i class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="welding">Weld</label>
                            <input class="input-group" type="number" name="welding" value="{{ $detail->welding }}">
                        </div>
                        <div class="col-md-4">
                            <label for="press">Press</label>
                            <input class="input-group" type="number" name="press" value="{{ $detail->press }}">
                        </div>
                        <div class="col-md-4">
                            <label for="saw">Saw</label>
                            <input class="input-group" type="number" name="saw" value="{{ $detail->saw }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="drill">Drilling</label>
                            <input class="input-group" type="number" name="drill" value="{{ $detail->drill }}">
                        </div>
                        <div class="col-md-4">
                            <label for="clean">Cleaning</label>
                            <input class="input-group" type="number" name="clean" value="{{ $detail->clean }}">
                        </div>
                        <div class="col-md-4">
                            <label for="paint">Paint</label>
                            <input class="input-group" type="number" name="paint" value="{{ $detail->paint }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pipe_thread">Pipe Thread</label>
                            <input class="input-group" type="number" name="pipe_thread" value="{{ $detail->pipe_thread }}">
                        </div>
                        <div class="col-md-4">
                            <label for="pipe_engage">Pipe Engage</label>
                            <input class="input-group" type="number" name="pipe_engage" value="{{ $detail->pipe_engage }}">
                        </div>
                        <div class="col-md-4">
                            <label for="press_setup">Press Setup</label>
                            <input class="input-group" type="number" name="press_setup" value="{{ $detail->press_setup }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 input-group">
                            <h5>Total: $ <span id="total">0.00</span></h5>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <a class="btn btn-secondary" href="{{ route('quotation.details.index', $quotation) }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
