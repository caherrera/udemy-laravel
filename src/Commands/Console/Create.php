<?php

namespace Udemy\Laravel\Commands\Console;

use Illuminate\Console\Command;

class Create extends Command
{
    /**
     * The signature of the console command.
     *
     * @var string
     */
    protected $signature = 'udemy:create 
        {domain : example \'mydomain.com\'} 
        {originalURL : example "https://google.com"}
        
        {--path= : Set path value to new link }
        {--title= : Set title value to new link }
        {--icon= : Set icon value to new link }
        {--archived= : Set archived value to new link }
        {--iphoneURL= : Set iphoneURL value to new link }
        {--androidURL= : Set androidURL value to new link }
        {--splitURL= : Set splitURL value to new link }
        {--expiresAt= : Set expiresAt value to new link }
        {--expiredURL= : Set expiredURL value to new link }
        {--redirectType= : Set redirectType value to new link }
        {--cloaking= : Set cloaking value to new link }
        {--source= : Set source value to new link }
        {--AutodeletedAt= : Set AutodeletedAt value to new link }
        
    ';

    /**
     * The description of the console command.
     *
     * @var string
     */
    protected $description = 'Create a short link on udemy api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    }
}
