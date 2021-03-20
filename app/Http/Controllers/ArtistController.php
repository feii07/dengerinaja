<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artist;

class ArtistController extends Controller
{ 

    public function all()
    {
        return Artist::all();
        
    }

    public function show($id)
    {
        return Artist::find($id);
        
    }

    public function store(Request $request)
    {
        return Artist::create($request->all());
    }

    public function update($id, Request $request)
    {
        $artist = Artist::find($id);
        $artist->update($request->all());
        return $artist;
    }

    public function delete($id)
    {
        $artist = Artist::find($id);
        $artist->delete();
        return 204;
    }

}
