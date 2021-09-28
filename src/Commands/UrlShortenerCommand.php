<?php

namespace Marjose\UrlShortener\Commands;

use Illuminate\Console\Command;

class UrlShortenerCommand extends Command
{
    public $signature = 'url-shortener';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
