<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserGroupsController extends Controller
{
    public function index()
    {
        return view('groups.groups', [
            'groups' => Group::all()
        ]);
    }
    public function create()
    {
        return view('groups.create-group');
    }
    public function store(Request $request)
    {
        $request->validate([
            'group_title'   => 'required',
            // 'group_status'  => 'required'
        ]);
        try {
            DB::beginTransaction();
            $group               =  new Group();
            $group->title  =  $request->group_title;
            $group->save();
            DB::commit();

            return redirect()->route('group.index')->with('success', 'Group created!');

        } catch (\Throwable $th) {
            DB::rollBack();

        }
    }
}
