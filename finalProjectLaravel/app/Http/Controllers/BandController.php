<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
    }

    public function create()
    {
        return view('bands.create');
    }

    public function insertBand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image',
        ]);

        $band = new Band;
        $band->name = $validated['name'];

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path = $request->photo->store('public/bands');
            $band->photo = $path;
        }

        $band->save();

        return redirect('/bands')->with('success', 'Banda criada com sucesso!');
    }

    public function show(Band $band)
    {
        return view('bands.show', compact('band'));
    }

    public function edit(Band $band)
    {
        
        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image',
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path = $request->photo->store('public/bands');
            $validated['photo'] = $path;
        }

        $band->update($validated);
        return redirect('/bands')->with('success', 'Banda atualizada com sucesso!');
    }

    public function destroy(Band $band)
    {
        $band->delete();
        return back()->with('success', 'Banda deletada com sucesso!');
    }
}
