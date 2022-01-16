<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.users',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(1);
        return view('users.create',[
            'groups' => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // dd(1);
        $request->all();
        User::create($request->all());
        return redirect()->route('users.index')->with('message', 'User created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $tab_menu = 'user_info';
        return view('users.show',compact(['user', 'tab_menu']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $groups = Group::all();
        return view('users.edit',compact(['user','groups']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {
        $user = User::findOrFail($user);
        // dd($request->all());
        $request->validate([
            'group_id'  => 'required',
            'name'      => 'required|string',
            'phone'     => 'required|numeric|unique:users,phone,'.$user->id,
            'email'     => 'required|email|unique:users,email,' . $user->id,
        ]);
        try {
            DB::beginTransaction();
            if (Auth::user()) {
                $user->admin_id = Auth::user()->id;
            }

            $user->group_id = $request->group_id;
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $user->address  = $request->address;

            $user->save();
            DB::commit();

            return redirect()->route('users.index')->with('success', 'User updated!');

        } catch (\Throwable $th) {

            Db::rollBack();
            return redirect()->route('users.index')->with('error', 'User failed!');

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted!');

    }
}
