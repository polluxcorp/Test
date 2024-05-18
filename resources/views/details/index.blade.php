@extends('layouts.app')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5>Quote name: {{ $quotation->name }} / {{$quotation->client->name }} </h5>
                <p class="fst-italic">{{ $quotation->description }}</p>
            </div>
            <div class="col text-end">
                <a class="btn btn-dark" href="{{ route('quotation.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                <!--button type="button" class="btn btn-secondary" data-toggle="processConfig" data-placement="top" data-bs-toggle="modal" data-bs-target="#processConfigModal"><i class="fa-solid fa-gear"></i></button-->
                <a class="btn btn-secondary" href="{{ route('quotation.processes', $quotation) }}"><i class="fa-solid fa-gear"></i></a>
                <a class="btn btn-primary" href="{{ route('quotation.edit', $quotation) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-warning" href="{{ route('quotation.details.create', $quotation) }}"><i class="fa-solid fa-plus"></i></a>
                <!--<button type="button" class="btn btn-warning" data-toggle="add process" data-placement="top" data-bs-toggle="modal" data-bs-target="#processModal"><i class="fa-solid fa-plus"></i></button>-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end ">
                    <h4 class="">Grand Total: $</h4>
                    <h4 class="" id="grand-total">0.00</h4>
                </div>
                <table class="table table-striped table-hover table-sm" id="partnumber-table">
                    <thead>
                    <tr class="table table-secondary">
                        <th>Part Number</th>
                        <th>Part desc.</th>
                        <th class="text-center">Width</th>
                        <th class="text-center">Length</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Factor</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($details as $detail)
                        <tr>
                            <td class="handle">{{ $detail->partnumber->partnumber }}</td>
                            <td>{{ $detail->description ?: $detail->partnumber->description }}</td>
                            <td class="text-center">{{ $detail->width }}</td>
                            <td class="text-center">{{ $detail->length }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
                            <td class="text-center">{{ $detail->factor }}</td>
                            <td class="text-center">{{ $detail->total }}</td>
                            <td class="text-center">
                                <form action="{{ route('quotation.details.destroy', [$quotation, $detail]) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('quotation.details.edit', [$quotation, $detail]) }}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                            <td class="handle"><i class="fa-solid fa-bars"></i></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var table = document.getElementById('partnumber-table');
        var tbody = table.getElementsByTagName('tbody')[0];
        new Sortable(tbody, {
            animation: 150,
            handle: '.handle',
            ghostClass: 'sortable-ghost',
            dragClass: 'sortable-drag',
            onEnd: function(evt) {
                var rows = Array.from(evt.item.parentNode.children);
                var indexes = rows.map(function(row) {
                    return row.getAttribute('data-id');
                });
                // Actualizar la posición de los detalles en la base de datos
                /*rows.forEach(function(row, index) {
                    var detail_id = row.getAttribute('data-id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/quotation/details/' + detail_id,
                        type: 'PATCH',
                        data: {
                            position: index + 1
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });
                });*/
            }
        });

        // Calcular el gran total y mostrarlo
        function updateGrandTotal() {
            var grandTotal = 0;
            var totals = document.querySelectorAll('#partnumber-table tbody tr td:nth-child(7)');
            totals.forEach(function (totalElement) {
                grandTotal += parseFloat(totalElement.textContent);
            });
            document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
        }

        updateGrandTotal();
    </script>

    <style>
        .sortable-ghost {
            cursor: grabbing;
        }
        .sortable-drag {
            cursor: grabbing;
        }
    </style>
@endsection
