<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class,100)->create();
        factory(App\GovernmentBody::class,20)->create();
        factory(App\Department::class,40)->create();
    }

}
