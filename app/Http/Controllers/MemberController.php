<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function all()
    {
        return Member::all();
    }

    public function show($id)
    {
        return Member::find($id);
    }

    public function store(Request $request)
    {
        $member = Member::where('id', $request->id)->first();

        if(isset($user->id))
        {
            return response()->json(['error' => 'Id Already Exist']);
        }

        $member = new Member;
        $member->id = $request->id;
        $member->name = $request->name;
        $member->save();

        return response()->json($member, 201);
    }

    public function update($id, Request $request)
    {
        $member = Member::find($id);
        $member->update($request->all());
        return $member;
    }

    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        return 204;
    }
}
