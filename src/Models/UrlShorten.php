<?php

namespace Marjose\UrlShortener\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UrlShorten extends Model
{
    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];
    protected $table = 'urlShortener';

    function getisExpiredAttribute()
    {

        return sprintf('%s', Carbon::parse($this->created_at)->addMinutes($this->expiration)->isPast());
    }
}
