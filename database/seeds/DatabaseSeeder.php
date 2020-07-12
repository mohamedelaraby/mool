<?php

use App\Models\Admin;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /// Disable all tables foreign keys
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Truncate all tables data [ Empty all tables]
        User::truncate();
        Admin::truncate();
        Settings::truncate();

        // Set the quantity of each table elements
        $userQuantity = 200;
        $adminQuantity = 200;
        $settingsQuantity = 1;

        // Set the factories
        factory(User::class, $userQuantity)->create();
        factory(Admin::class,$adminQuantity)->create();
        factory(Settings::class,$settingsQuantity)->create();



        // factory(Category::class, $categoryQuantity)->create();




    }
}
