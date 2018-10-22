<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserEditFormRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    //edit
    public function edit($id){
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();
        return view('backend.users.edit',compact('user','roles','selectedRoles'));
    }

    //update
    public function update($id, UserEditFormRequest $request){
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        if($password != ""){
            $user->password = Hash::make($password);
        }
        $user->save();

        $user->syncRoles($request->get('role'));

        return redirect(action('Admin\UsersController@edit',$user->id))->with('status','The user has been updated');
    }
}
