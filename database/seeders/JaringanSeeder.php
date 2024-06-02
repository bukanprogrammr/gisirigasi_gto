<?php

namespace Database\Seeders;

use App\Models\Jaringan;
use Illuminate\Database\Seeder;

class JaringanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jaringan::create([
            'dirigasi_id' => '1',
            'geojson' => '6631682fe5faf.geojson',
            'foto' => '5MXVhTdZJLAjjdOmUhSSVIjerVwm4xonnEMqmK3B.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '2',
            'geojson' => '6631683eab7a2.geojson',
            'foto' => '6js6ZvXpUa3W2PBJ2oeLLYyy1QJa3JLiNGagbUR4.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '3',
            'geojson' => '66316847115dd.geojson',
            'foto' => 'cWRpOSdqon4KQNnQtRkMfnryK13JHRb6mYpHACGW.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '4',
            'geojson' => '663168511b1e4.geojson',
            'foto' => 'fAvHhuXbLmFZ9FcsTejnnmUx1pln9x6SalRyuesA.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '5',
            'geojson' => '6631685995141.geojson',
            'foto' => 'VwdvAYuS6kfs0vTggA0utmlA4RyqYfP5sBIOtBOr.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '6',
            'geojson' => '6631686b92bc7.geojson',
            'foto' => 'WNnfWvld9lNXyBCti8FWfVToxLsREDhndmnbch0Y.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '7',
            'geojson' => '663168789f9b9.geojson',
            // 'foto' => ''
        ]);

        Jaringan::create([
            'dirigasi_id' => '8',
            'geojson' => '6631688206d9e.geojson',
            // 'foto' => ''
        ]);

        Jaringan::create([
            'dirigasi_id' => '9',
            'geojson' => '6631689259632.geojson',
            // 'foto' => ''
        ]);

        Jaringan::create([
            'dirigasi_id' => '10',
            'geojson' => '665c2ba72b8dd.geojson',
            // 'foto' => ''
        ]);

        Jaringan::create([
            'dirigasi_id' => '11',
            'geojson' => '66553a693d5ad.geojson',
            // 'foto' => ''
        ]);
    }
}
