<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Theme;

class Response extends Model
{

    public function theme() {

        return $this->belongsTo(Theme::class);
    }

}
