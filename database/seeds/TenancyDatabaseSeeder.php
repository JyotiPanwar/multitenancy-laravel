<?php

use Illuminate\Database\Seeder;

class TenancyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Models\Customer\User::class, 2)->create();
        $users->each(function ($user) {
            factory(App\Models\Customer\Post::class, 3)->create(['user_id' => $user->id]);
        });
    }
}
