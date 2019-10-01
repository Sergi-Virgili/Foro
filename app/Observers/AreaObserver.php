<?php

namespace App\Observers;

use App\Area;

class AreaObserver
{
    public function deleting(Area $area)
    {
        $area->themes->each(function($theme){
        $theme->delete();
        });
    }
    
}
