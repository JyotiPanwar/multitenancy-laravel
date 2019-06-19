<?php

namespace App\Models\Customer;

use App\User as Main;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class User extends Main
{
    use UsesTenantConnection;
    protected $with = ['posts'];
   
    public function posts()
    {
        return $this->hasMany(\App\Models\Customer\Post::class);
    }
}
