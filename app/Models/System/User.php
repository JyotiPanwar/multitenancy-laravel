<?php
namespace App\Models\System;

use App\Models\Shared\User as Shared;
use Hyn\Tenancy\Traits\UsesSystemConnection;

class User extends Shared
{
    use UsesSystemConnection;
}