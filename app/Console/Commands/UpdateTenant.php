<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateTenant extends Command
{
    protected $signature = 'tenant:update {slug}';
    protected $description = 'Update a tenants database';
    protected $migrator;

    public function __construct()
    {
        parent::__construct();

        $this->migrator =  app()->make('migrator');
    }
    public function handle()
    {
        $arguments = $this->arguments();

        if ($account = DB::connection('tenant_system')->table('posts')) {
                config()->set('database.connections.tenant_system.database', $arguments['slug']); 
                DB::disconnect('tenant_system');
                $this->migrator->setConnection('tenant_system');
                if (! $this->migrator->repositoryExists()) {
                    $this->call('migrate:install', ['--database' => 'tenant_system']);
                }
                $this->migrator->run(['--path'=>'database/migrations/customers/tenant1']);
                foreach ($this->migrator->getNotes() as $note) {
                    $this->output->writeln($note);
                }
        }
       
    }
}