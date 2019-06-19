<?php

namespace App\Models\System;

use App\User as Main;
use Hyn\Tenancy\Traits\UsesSystemConnection;

class User extends Main
{
    use UsesSystemConnection;
}