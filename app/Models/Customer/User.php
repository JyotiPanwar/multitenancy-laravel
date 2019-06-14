<?php

namespace App\Models\Customer;

use App\Models\Shared\User as secondary;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class User extends secondary
{
    use UsesTenantConnection;
    
    protected $with = ['posts'];
   
    public function posts()
    {
        return $this->hasMany(\App\Models\Customer\Post::class);
    }
}