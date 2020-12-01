<?php

namespace Udemy\Laravel\Commands\Console;

use Illuminate\Console\Command;
use Udemy\Laravel\Model\Link;

class GetLink extends Command
{
    /**
     * The signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Udemy:getlink
        {id}
    ';

    /**
     * The description of the console command.
     *
     * @var string
     */
    protected $description = 'Create a short link on Short.io';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $id   = $this->argument('id');
        $link = Link::find($id);

        $this->info("Short Url {$link->shortURL}");
        $this->info($link);
    }
}
