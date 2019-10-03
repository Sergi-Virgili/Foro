<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Theme;
use App\File;

class Response extends Model implements Searchable
{

    protected $fillable = [
        'user_id', 'theme_id', 'content'
    ];
    public function theme() {

        return $this->belongsTo(Theme::class);
    }
    public function file() {

        return $this->hasMany(File::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('theme.show', $this->theme_id);

        return new SearchResult(
            $this,
            $this->content,
            $url
         );

    }

}
