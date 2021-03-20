<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;


class CommentController extends Controller
{
    public function all()
    {
        return Comment::all();
    }

    public function show($id)
    {
        return Comment::where('song_id',$id)->get();
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->member_id = $request->member_id;
        $comment->song_id = $request->song_id;
        $comment->save();

        return response()->json($comment, 201);
    }

    public function update($id, Request $request)
    {
        $comment = Comment::find($id);
        $comment->update($request->all());
        return $comment;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return 204;
    }
}
