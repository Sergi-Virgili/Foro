<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'title', 'content', 'area_id'
    ];

    public function responses() {

        return $this->hasMany(Response::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function area() {

        return $this->belongsto(Area::class);
    }
 }
