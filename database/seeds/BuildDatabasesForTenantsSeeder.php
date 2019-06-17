<?php

use Hyn\Tenancy\Contracts\Repositories\CustomerRepository;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Customer;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Database\Seeder;

class BuildDatabasesForTenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $customers = [
            ['database' => 'tenant1', 'domain' => 'tenant1.local', 'name' => 'tenant1', 'email' => 'tenant1@foo.com'],
            ['database' => 'tenant2', 'domain' => 'tenant2.local', 'name' => 'tenant2', 'email' => 'tenant2@bar.com'],
        ];  
    
    	foreach ($customers as $customer) {
            /*
            |--------------------------------------------------------------------------
            | CREATE THE WEBSITE
            |--------------------------------------------------------------------------
             */
            $website = new Website(['uuid' => $customer['database']]);
            app(WebsiteRepository::class)->create($website);
            /*
            |--------------------------------------------------------------------------
            | CREATE THE HOSTNAME
            |--------------------------------------------------------------------------
             */
            $hostname = new Hostname(['fqdn' => $customer['domain']]);
            app(HostnameRepository::class)->attach($hostname, $website);
            /*
            |--------------------------------------------------------------------------
            | CREATE THE CUSTOMER
            |--------------------------------------------------------------------------
             */
            $customer = new Customer(['name' => $customer['name'], 'email' => $customer['email']]);
            app(CustomerRepository::class)->create($customer);
            /*
            |--------------------------------------------------------------------------
            | SAVE THE CUSTOMER WITH HIS HOSTNAME AND WEBSITE
            |--------------------------------------------------------------------------
             */
            $hostname->customer()->associate($customer)->save();
            $website->customer()->associate($customer)->save();
        }
}
}