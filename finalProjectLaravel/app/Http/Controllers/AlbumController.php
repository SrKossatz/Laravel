<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class AlbumController extends Controller
{
    public function create()
    {
        $bands = Band::all();
        return view('albums.createAlbum', compact('bands'));
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'release_date' => 'required|date',
            'band_id' => 'required|exists:bands,id',
        ]);

        $album = new Album();
        $album->band_id = $request->band_id;
        $album->name = $request->name;
        $album->release_date = $request->release_date;

        $album->save();

        return redirect()->route('bands.show', ['band' => $validated['band_id']])->with('success', 'Álbum criado com sucesso!');
    }

    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        $bands = Band::all();
        return view('albums.editAlbum', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'name' => 'required',

            'release_date' => 'required|date',
            'band_id' => 'required|exists:bands,id',
        ]);

        $album = Album::findOrFail($album);
        $album->update($validated);

        return redirect()->route('bands.show', $validated['band_id'])->with('success', 'Álbum atualizado com sucesso!');
    }
}
