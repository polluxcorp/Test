<?php

namespace App\Http\Controllers;

use App\Models\Laser;
use Illuminate\Http\Request;

class LaserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laserData = Laser::all();
        return view('laser.index', compact('laserData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laser.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=[
            'lasertype'=>'required|string|max:100',
            'price'=>'required|string|max:100',
        ];
        $message=[
            'lasertype'=>'Laser cut name is required',
            'price'=>'Price is required',
        ];
        $this->validate($request, $fields, $message);
        $laser = new Laser();
        $laser->lasertype = request()->input('lasertype');
        $laser->price = request()->input('price');
        $laser->save();
        return redirect('laser')->with('message', 'Laser Cut added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laser $laser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $laserData=Laser::findOrFail($id);
        return view('laser.edit', compact('laserData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $fields=[
            'lasertype'=>'required|string|max:100',
            'price'=>'required|string|max:100',
        ];
        $message=[
            'lasertype'=>'Laser cut name is required',
            'price'=>'Price is required',
        ];
        $this->validate($request, $fields, $message);

        $laserData = request()->except(['_token', '_method']);
        Laser::where('id', '=', $id)->update($laserData);
        return redirect('laser')->with('message', 'Laser Cut updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Laser::destroy($id);
        return redirect('laser')->with('message', 'Laser Cut deleted successfully');
    }
}
