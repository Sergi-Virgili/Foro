<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForoPermission;
use App\User;

class ForoPermissionController extends Controller
{
    public function index() {

        // TODO: ALL 
        $users = User::all();
        $permissions = ForoPermission::all();
       // $userPermissions = $this->permissionUser();
        return view('foro.admin', ['permissions' => $permissions,
                                    'users' => $users] );
    }

    public function permissionUser(User $user) {
        $permissions = ForoPermission::getFromUser($user);
        
    }

    public function destroy(User $user) 
    {

        return Redirect::back()->with('msg', 'Moderador Borrado');
    }

    public function store(Request $request)
    {

    }
}
