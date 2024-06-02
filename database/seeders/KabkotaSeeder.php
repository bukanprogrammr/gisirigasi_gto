<?php

namespace Database\Seeders;

use App\Models\Kabkota;
use Illuminate\Database\Seeder;

class KabkotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kabkota::create([
            'id' => '1',
            'nama_kabkota' => 'Kota Gorontalo',
            'warna' => '#A1FDFD',
            'geojson' => '665c2a4427c5c.geojson',
        ]);
        Kabkota::create([
            'id' => '2',
            'nama_kabkota' => 'Kab. Bone Bolango',
            'warna' => '#98F9A1',
            'geojson' => '662a074f159b9.geojson',
        ]);
        Kabkota::create([
            'id' => '3',
            'nama_kabkota' => 'Kab. Gorontalo',
            'warna' => '#FDB3D3',
            'geojson' => '662a07573355b.geojson',
        ]);
        Kabkota::create([
            'id' => '4',
            'nama_kabkota' => 'Kab. Gorontalo Utara',
            'warna' => '#FDFDB3',
            'geojson' => '662a07761deef.geojson',
        ]);
        Kabkota::create([
            'id' => '5',
            'nama_kabkota' => 'Kab. Boalemo',
            'warna' => '#FDCCB3',
            'geojson' => '662a075f21c91.geojson',
        ]);
        Kabkota::create([
            'id' => '6',
            'nama_kabkota' => 'Kab. Pohuwato',
            'warna' => '#B3B7FD',
            'geojson' => '665c292ba5fff.geojson',
        ]);
    }
}
