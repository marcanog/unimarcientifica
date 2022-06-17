<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{
    
    public function index()
    {
        $users=User::all();
        $users = User::orderBy('created_at','desc')->orderBy('id')->paginate(10);
        return view('admin.user.index', compact("users"));
    }

    public function edit($id)
    {
        if(Auth::user()->id== $id){
            return redirect()->route('user.index');
        }return view ('admin.user.edit')->with(['user' => User::find($id), 'roles'=> Role::all()]);
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()->id== $id){
            return redirect()->route('admin.user.index');
        }
        $user = User::find($id);
        $user ->roles()->sync($request->roles);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index');
    }
}
