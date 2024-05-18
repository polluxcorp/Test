<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Carbon\Cli;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $clients = Client::paginate(10);
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=[
            'name'=>'required|string|max:100',
            'description'=>'required|string|max:200',
            'real_name'=>'required|string|max:200'
        ];
        $message=[
            'name.required'=>'Name is required',
            'description.required'=>'Description is required',
            'real_name.required'=>'Real name is required'
        ];
        $this->validate($request,$fields,$message);

        $client = new Client();
        $client->name = request()->input('name');
        $client->real_name = request()->input('real_name');
        $client->description = request()->input('description');
        $client->notes = request()->input('notes');
        $client->save();
        return redirect('client')->with('message', 'Customer added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $fields=[
            'name'=>'required|string|max:100',
            'description'=>'required|string|max:200',
            'real_name'=> 'required|string|max:200'
        ];
        $message=[
            'name.required'=>'Name is required',
            'description.required'=>'Description is required',
            'real_name.required'=>'Real name is required'
        ];
        $this->validate($request,$fields,$message);

        $clientData = request()->except(['_token','_method']);
        Client::where('id', '=', $id)->update($clientData);
        return redirect('client')->with('message','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Client::destroy($id);
        return redirect(route('client.index'))->with('message', 'Customer deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $items = Client::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('notes', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('client.index', compact('items'));
    }
}
