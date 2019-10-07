<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForoPermission extends Model
{
    public function users() {
        return $this->belongsToMany('App\User', 'foro_permissions_users', 'foro_permission_id', 'user_id'); 
    }

    public static function getFromUser($user){
        $userPermissions = ForoPermission::with('users')->where('user_id' ,$user->id)->get();
        return $userPermissions;
    } 
}
