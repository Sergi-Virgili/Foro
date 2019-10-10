<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\ForoPermission;

class ForoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        // $permissions = ForoPermission::all();
        // $users = [];
        // foreach ($permissions[0]->users as $user)
        // {
        // array_push($users, $user->id);
        // };
       
        // if (in_array($request->user()->id,$users)) {
        //     return $next($request);
        // }
        if(ForoPermission::is_ForoAdmin($request->user())){
            return $next($request);
        }

        return redirect('/foro');
        
    }
}
