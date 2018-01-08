<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserEditFormRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::with('roles')->get();

    	return view('backend.users.index', compact('users'));
    }

    public function edit($id)
    {
    	$user = User::whereId($id)->firstOrFail();
    	$roles = Role::all();
    	$selectedRole = $user->roles()->pluck('name')->toArray();

    	if (!$user->hasRole('manager') || $user->id == Auth::user()->id) {
    		return view('backend.users.edit', compact('user', 'roles', 'selectedRole'));
    	} else {
    		return view('error.400');
    	}
    }

    public function update($id, UserEditFormRequest $request)
    {
    	$user = User::whereId($id)->firstOrFail();

    	if (!$user->hasRole('manager') || $user->id == Auth::user()->id) {
	    	$user->name = $request->get('name');
	    	$user->email = $request->get('email');
	    	$password = $request->get('password');

	    	if ($password != '') {
	    		$user->password = Hash::make($password);
	    	}

	    	$user->save();

	    	$user->syncRoles($request->get('role'));

	    	return redirect(action('Admin\UserController@edit', $user->id))->with('status', 'The user has been updated');
	    } else {
	    	return response("Bad Request", 400)->header("Content-type", "text/plain");
	    }
    }
}
