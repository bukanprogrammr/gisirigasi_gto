<?php

namespace Database\Seeders;

use App\Models\Sawah;
use Illuminate\Database\Seeder;

class SawahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sawah::create([
            'kabkota_id' => '4',
            'geojson' => '665cb47872707.geojson',
            // 'foto' => ''
        ]);

        Sawah::create([
            'kabkota_id' => '6',
            'geojson' => '665caa710e84c.geojson',
            // 'foto' => ''
        ]);

        // Sawah::create([
        //     'kabkota_id' => '5',
        //     'geojson' => '66553f8906557.geojson',
        //     // 'foto' => ''
        // ]);

        // Sawah::create([
        //     'kabkota_id' => '2',
        //     'geojson' => '66553f7d8fea2.geojson',
        //     // 'foto' => ''
        // ]);
    }
}
