<?php

namespace App\Http\Controllers;

use App\Models\PartNumber;
use Illuminate\Http\Request;

class PartNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnumbers = PartNumber::all();
        return view('partnumber.index', compact('partnumbers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partnumber.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = [
            'sheetname' => 'required|string|max:100',
            'partnumber' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'unitmeasure' => 'required|string|max:100',
            'price' => 'required|numeric|min:0.01|max:999.99',
        ];
        $messages = [
            'sheetname' => 'Sheet name is required',
            'partnumber' => 'Part number is required',
            'description' => 'Description is required',
            'unitmeasure' => 'Unit Measure is required',
            'price' => 'Price is required',
        ];
        $this->validate($request, $fields, $messages);

        $partnumber = new PartNumber();
        $partnumber->sheetname = request()->input('sheetname');
        $partnumber->partnumber = request()->input('partnumber');
        $partnumber->description = request()->input('description');
        $partnumber->unitmeasure = request()->input('unitmeasure');
        $partnumber->price = floatval(request()->input('price'));
        $partnumber->weight = floatval(request()->input('weight', 0.0));
        $partnumber->width = intval(request()->input('width', 0));
        $partnumber->length = intval(request()->input('length', 0));
        $partnumber->save();
        return redirect(route('partnumber.index'))->with('message', 'Part Number added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartNumber $partnumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartNumber $partnumber)
    {
        return view('partnumber.edit', compact('partnumber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartNumber $partnumber)
    {
        $fields = [
            'sheetname' => 'required|string|max:100',
            'partnumber' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'unitmeasure' => 'required|string|max:100',
            'price' => 'required|numeric|min:0.01|max:999.99',
            'weight' => 'required|numeric|min:0.00|max:999.99',
            'width' => 'required|int|min:0|max:99999',
            'length' => 'required|int|min:0|max:99999',
        ];
        $message = [
            'sheetname' => 'Sheet name is required',
            'partnumber' => 'Part number is required',
            'description' => 'Description is required',
            'unitmeasure' => 'Unit Measure is required',
            'price' => 'Invalid Price',
            'weight' => 'Invalid Weight',
            'width' => 'Invalid Width',
            'length' => 'Invalid Length',
        ];
        $this->validate($request, $fields, $message);

        $inputs = request()->except(['_token', '_method']);
        $partnumber->update($inputs);
        return redirect(route('partnumber.index'))->with('message', 'Part number updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PartNumber::destroy($id);
        return redirect(route('partnumber.index'))->with('message', 'Part number deleted successfully');
    }
}
