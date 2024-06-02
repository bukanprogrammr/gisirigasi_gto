<?php

namespace Database\Seeders;

use App\Models\Dirigasi;
use Illuminate\Database\Seeder;

class DirigasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dirigasi::create([
            'id' => '1',
            'nama_dirigasi' => 'Lomaya Alale',
            'luas' => '153'
        ]);

        Dirigasi::create([
            'id' => '2',
            'nama_dirigasi' => 'Bulango Ulu',
            'luas' => '675'
        ]);

        Dirigasi::create([
            'id' => '3',
            'nama_dirigasi' => 'Bongo',
            'luas' => '564'
        ]);

        Dirigasi::create([
            'id' => '4',
            'nama_dirigasi' => 'Bulia',
            'luas' => '234'
        ]);

        Dirigasi::create([
            'id' => '5',
            'nama_dirigasi' => 'Huludupitango',
            'luas' => '123'
        ]);

        Dirigasi::create([
            'id' => '6',
            'nama_dirigasi' => 'Alopohu',
            'luas' => '122'
        ]);

        Dirigasi::create([
            'id' => '7',
            'nama_dirigasi' => 'Paguyaman',
            'luas' => '522'
        ]);

        Dirigasi::create([
            'id' => '8',
            'nama_dirigasi' => 'Tolinggula',
            'luas' => '112'
        ]);

        Dirigasi::create([
            'id' => '9',
            'nama_dirigasi' => 'Tabulo Latula',
            'luas' => '1422'
        ]);

        Dirigasi::create([
            'id' => '10',
            'nama_dirigasi' => 'Randangan',
            'luas' => '5312'
        ]);

        Dirigasi::create([
            'id' => '11',
            'nama_dirigasi' => 'Taluduyunu',
            'luas' => '812'
        ]);
    }
}
