<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongController extends Controller
{
    public function all()
    {
        return Song::with('artist')->get();
    }

    public function show($id)
    {
        return Song::find($id);
    }

    public function store(Request $request)
    {
        return Song::create($request->all());
    }

    public function update($id, Request $request)
    {
        $song = Song::find($id);
        $song->update($request->all());
        return $song;
    }

    public function delete($id)
    {
        $song = Song::find($id);
        $song->delete();
        return 204;
    }
}
