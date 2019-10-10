<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForoPermission;
use App\User;
use Illuminate\Database\Eloquent\Builder;

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
        $permissions = ForoPermission::all();

        
        //$permissions[0]->users->find($user)->detach();

        
        
         $permission = $permissions[0];
         $permission->users()->detach($user->id);
        // dd($permission);
       //echo 'deleting moderator';
        return redirect()->back()->with('msg', 'Moderador Borrado');
    }

    public function addModerator(Request $request)
    {
        $userId = $request->user_id;
        $permissions = ForoPermission::all();
        $permissions[0]->users()->attach($userId);
        return redirect()->back();
    }
}
