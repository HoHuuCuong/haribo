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
        // $this->call(UsersTableSeeder::class);
        factory(\App\Model\AccountGroups::class, 1)->create();
        factory(\App\Model\Accounts::class, 1)->create();
        factory(\App\Model\Language::class, 1)->create();
        \App\Model\Roles::setDefault(\App\Model\Functions::makeDefault());
    }
}