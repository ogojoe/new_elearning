<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer Usuarios')->only('index');
        $this->middleware('can:Editar Usuarios')->only('edit','update');
    }
    
    public function index()
    {
        return view('admin.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $schools = School::all();
        return view('admin.users.edit',compact('user','roles','schools'));
    }

    
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit',$user)->with('info','Roles asignados con éxito.');
    }

   
}
