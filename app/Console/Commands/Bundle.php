<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Bundle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bundle {name : Name of stuffs to be created}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bundle command to create Model, Migration, Resource, Request and Controller';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->info("Building the request class of {$name}");
        $this->call("make:request",['name'=>"{$name}Request"]);
        $this->info("Building the resource class of {$name}");
        $this->call("make:resource",['name'=>"{$name}Resource"]);
        $this->info("Building the model class of {$name}");
        $this->call("make:model",['name'=>$name, '-m'=>true, '-r'=>true]);
    }
}
