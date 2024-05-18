<?php

namespace App\Http\Controllers;

use App\Internal\ProcessesManager;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessesManager $processesSettings)
    {
        return view('processes.edit', ['processesSettings' => $processesSettings->defaultSettings()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProcessesManager $processesSettings)
    {
        $fields = [];
        $messages = [];
        $defaultSettings = $processesSettings->defaultSettings();
        foreach ($defaultSettings as $key => $values) {
            $fields[$key] = 'required|string';
            $messages[$key . '.required'] = sprintf('%s is required', $values['name']);
        }
        $this->validate($request, $fields, $messages);

        $updatedSettings = $defaultSettings;
        foreach ($defaultSettings as $key => $values) {
            $updatedSettings[$key]['price'] = round(floatval($request->get($key)), 4);
        }
        $processesSettings->store($updatedSettings);
        return redirect('processes')->with('message','Process updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Process::destroy($id);
        return redirect('process')->with('message','Process deleted successfully');
    }
}
