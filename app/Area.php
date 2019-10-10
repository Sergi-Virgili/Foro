<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Area extends Model implements Searchable
{
    //
    protected $fillable = ['id','name','description'];

    public function themes() {

        return $this->hasMany(Theme::class);
    }

    public function files(){

        return $this->hasMany(Files::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('area.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }
}

