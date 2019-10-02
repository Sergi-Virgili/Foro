<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class ForoUser extends User
{
    public function themes () {
        
        return $this->hasMany(Theme::class);
    }

    public function responses() {

        return $this->hasMany(Response::class);
    }
}
