<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use App\Models\Settings;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// Users
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// Users
$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});

//Settings factory
$factory->define(Settings::class, function (Faker $faker) {
    return [
        'sitename_ar' => $faker->word,
        'sitename_en' => $faker->word,
        'logo' =>$faker->randomElement(['1.jpg','2.jpg','3.jpg']),
        'icon' =>$faker->randomElement(['1.jpg','2.jpg','3.jpg']),
        'email' => $faker->unique()->safeEmail,
        'description' => $faker->paragraph(2),
        'keywords' => $faker->paragraph(2),
        'status'=>$faker->randomElement([Settings::OPEN_STATUS,Settings::CLOSE_STATUS]),
        'message_maintenance'=>$faker->paragraph(2),
        'main_lang'=>$faker->randomElement([Settings::AR_LANG,Settings::EN_LANG]),
    ];
});

// Transactions factory
// $factory->define(Transaction::class, function (Faker $faker) {
// 	// GEt th seller and the buyer
// 	$seller = Seller::has('products')->get()->random();
// 	$buyer = User::all()->except($seller->id)->random();
//     return [
//         'quantity'=> $faker->numberBetween(1,3),
//         'buyer_id'=>$buyer->id,
//         'product_id'=>$seller->products->random()->id,
//     ];
// });
