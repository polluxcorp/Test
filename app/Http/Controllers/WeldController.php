<?php

namespace App\Http\Controllers;

use App\Models\Weld;
use Illuminate\Http\Request;

class WeldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weldData = Weld::all();
        return view('weld.index', compact('weldData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weld.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=[
            'weldtype'=>'required|string|max:100',
            'price'=>'required|string|max:100',
        ];
        $message=[
            'weldtype'=>'Weld name is required',
            'price'=>'Price is required',
        ];
        $this->validate($request, $fields, $message);
        $weld = new Weld();
        $weld->weldtype = request()->input('weldtype');
        $weld->price = request()->input('price');
        $weld->save();
        return redirect('weld')->with('message', 'Weld Process added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weld $weld)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $weldData=Weld::findOrFail($id);
        return view('weld.edit', compact('weldData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $fields=[
            'weldtype'=>'required|string|max:100',
            'price'=>'required|string|max:100',
        ];
        $message=[
            'weldtype'=>'Weld name is required',
            'price'=>'Price is required',
        ];
        $this->validate($request, $fields, $message);

        $weldData = request()->except(['_token', '_method']);
        Weld::where('id', '=', $id)->update($weldData);
        return redirect('weld')->with('message', 'Weld Process updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Weld::destroy($id);
        return redirect('weld')->with('message', 'Weld Process deleted successfully');
    }
}
