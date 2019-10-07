<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Theme extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('theme.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
         );
    }


    public static function getFromUser($user){
        
        //TODO : return all themes from user id.

        return Theme::where('user_id' , $user->id)->get();
    }

    

 }
