<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleFormRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
//    get view
    public function create(){
        return view('backend.roles.create');
    }

//    post create
    public function store(RoleFormRequest $request){
        Role::create(['name'=> $request->get('name')]);
        return redirect('/admin/roles/create')->with('status','A new  role has been created!');
    }

    //view all role
    public function index(){
        $roles = Role::all();
        return view('backend.roles.index',compact('roles'));
    }
}
