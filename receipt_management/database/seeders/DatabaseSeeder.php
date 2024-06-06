<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Receipts;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // testアカウントにレシートのデータを生成
        for ($i = 0; $i < 100; $i++) {
            Receipts::create([
                'length' => $faker->randomFloat(1, 13.3, 20.9),
                'user_id' => 4,
            ]);
        }
    }
}
