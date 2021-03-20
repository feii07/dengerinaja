<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;

class SubController extends Controller
{
    public function all()
    {
        return Subscription::all();
    }

    public function show($id)
    {
        return Subscription::where('member','like',$id)->get();
    }

    public function store(Request $request)
    {
        $subs = new Subscription;
        $subs->member = $request->member;
        $subs->genre = $request->genre;
        $subs->save();

        return response()->json($subs, 201);
    }

    public function update($id, Request $request)
    {
        $sub = Subscription::find($id);
        $sub->update($request->all());
        return $sub;
    }

    public function delete($id)
    {
        $sub = Subscription::find($id);
        $sub->delete();
        return 204;
    }

    public function deleteGenre($id , $genre)
    {
        $sub = Subscription::where('member',$id)->where('genre',$genre);
        $sub->delete();
        return 204;
    }
}
