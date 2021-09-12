<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ad;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        \App\Models\Ad::factory(10)->create();

    }
}
