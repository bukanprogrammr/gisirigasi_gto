<?php

namespace Database\Seeders;

use App\Models\Kabkotadirigasi;
use Illuminate\Database\Seeder;

class KabkotaDirigasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kabkotadirigasi::create([
            'dirigasi_id' => '1',
            'kabkota_id' => '1',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '1',
            'kabkota_id' => '2',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '1',
            'kabkota_id' => '3',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '2',
            'kabkota_id' => '2',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '2',
            'kabkota_id' => '3',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '3',
            'kabkota_id' => '3',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '4',
            'kabkota_id' => '3',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '5',
            'kabkota_id' => '3',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '6',
            'kabkota_id' => '3',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '7',
            'kabkota_id' => '3',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '7',
            'kabkota_id' => '5',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '8',
            'kabkota_id' => '4',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '9',
            'kabkota_id' => '5',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '10',
            'kabkota_id' => '6',
        ]);

        Kabkotadirigasi::create([
            'dirigasi_id' => '11',
            'kabkota_id' => '6',
        ]);
    }
}
