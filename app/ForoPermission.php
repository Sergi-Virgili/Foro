<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Concerns;

class ForoPermission extends Model
{
    public function users() {
        return $this->belongsToMany('App\User', 'foro_permissions_users', 'foro_permission_id', 'user_id'); 
    }

    public static function is_ForoAdmin(User $user){
        // $userPermissions = ForoPermission::with('users')->where('user_id' ,$user->id)->get();
        $permissions = ForoPermission::all();
        $usersAdmin = [];
        foreach ($permissions[0]->users as $userAdmin)
        {
        array_push($usersAdmin, $userAdmin->id);
        };
       
        if (in_array($user->id,$usersAdmin)) {
            return true;
        }
        
        return false;
    } 
}
