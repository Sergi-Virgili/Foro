<?php

namespace App\Observers;

use App\Theme;

class ThemeObserver
{
    public function deleting(Theme $theme)
    {
        $theme->responses()->delete();
    }
}