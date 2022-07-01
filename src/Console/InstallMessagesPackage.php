<?php
namespace Leeuwenkasteel\Messages\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Artisan;

class InstallMessagesPackage extends Command
{
    protected $signature = 'messages:install';

    protected $description = 'Install the MessagesPackage';

    public function handle()
    {
        $this->callSilent('notifications:table');
        $this->callSilent('migrate');
        $this->callSilent('vendor:publish', ['--tag' => 'mess_migrations']);
        $this->callSilent('migrate');

        $this->info("The packages is installed, get start with it");
    }
}