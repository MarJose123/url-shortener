<?php

namespace Marjose\UrlShortener;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Marjose\UrlShortener\Models\UrlShorten;

class UrlShortener
{
    private string $link;
    private int $expiration;
    private int $length;

    public function __construct()
    {
        $this->expiration = config('UrlShortener.expiration');
        $this->length = config('UrlShortener.length');
    }

    /**
     * @throws \Exception
     */
    private function validate($url)
    {
        if (empty($url) || $url === null) {
            return throw new \Exception('URL is missing or not valid');
        }
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            return throw new \Exception('URL is missing or not valid');
        }

        return true;
    }

    private function getData()
    {
        if ($this->link === null) {
            return throw new \Exception('URL is missing or not valid');
        }

        return UrlShorten::where('shorten_link', $this->link)->orWhere('original_link', $this->link)->first();
    }

    public function isExpired(): bool
    {
        $data = $this->getData();
        if (! isset($data)) {
            return throw new \Exception('Entity not found');
        }

        return Carbon::parse($data->created_at)->addMinutes($data->expiration)->isPast();
    }

    public function setExpiration($minutes): UrlShortener
    {
        $this->expiration = $minutes;

        return $this;
    }

    public function setLength($x): UrlShortener
    {
        $this->length = $x;

        return $this;
    }

    public function url($url): UrlShortener
    {
        $this->link = $url;

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function generate()
    {
        if ($this->validate($this->link) !== true) {
            return throw new \Exception('URL is missing or not valid');
        }
        $string = Str::random($this->length);
        $new_link = env('APP_URL')."/s/".$string;

        return UrlShorten::create([
        'param' => $string,
        'expiration' => $this->expiration,
        'original_link' => $this->link,
        'shorten_link' => $new_link,
        ]);
    }
}
