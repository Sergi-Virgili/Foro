<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Theme;

class Response extends Model implements Searchable
{

    public function theme() {

        return $this->belongsTo(Theme::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('response.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }

}
