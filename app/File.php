<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Theme;
use App\Response;

class File extends Model
{
    protected $fillable = [
        'path','theme_id','response_id','id'
    ];

    public function getUrlPathAtribute(){

        return \Storage::url($this->path);
    }

    public function theme() {

        return $this->belongsTo(Theme::class);
    }
    public function response() {

        return $this->belongsTo(Response::class);
    }
}