<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        {
            $this->call(UserSeeder::class);
            $this->call(KabkotaSeeder::class);
            $this->call(DirigasiSeeder::class);
            $this->call(KabkotaDirigasiSeeder::class);
            $this->call(BendungSeeder::class);
            $this->call(JaringanSeeder::class);
            $this->call(SawahSeeder::class);
            $this->call(MasyarakatSeeder::class);
        }
    }
}
