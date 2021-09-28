<?php

namespace Marjose\UrlShortener;

use Illuminate\Support\Str;
use Marjose\UrlShortener\Models\UrlShorten;

class UrlShortener
{
    private $link;
    private $new_link;
    private $settings;
    private $length;

    public function __construct($link)
    {
        $this->link = $link;
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

    public function setLength($x): UrlShortener
    {
        $this->length = $x;

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
        $this->new_link = env('APP_URL')."/s/".$string;

        return UrlShorten::create([
        'param' => $string,
        'original_link' => $this->link,
        'shorten_link' => $this->new_link,
        ]);
    }
}
