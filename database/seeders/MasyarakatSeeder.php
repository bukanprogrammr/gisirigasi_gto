<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Masyarakat::create([
            'id' => '1',
            'nik' => '1928736543678',
            'nama' => 'pulu',
            'no_hp' => '082303473763',
            'koordinat' => '0.6162370562318944, 123.0862049481897',
            'foto' => 'xelCkBG963uEpjzWv9hHaEfmrqzKfDrgEDi5y0tg.jpg',
            'kritik' => 'Saluran Irigasi Bermasalah tolong segera diperbaiki',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '2',
            'nik' => '156876536543678',
            'nama' => 'bibi lung',
            'no_hp' => '06565473763',
            'koordinat' => '0.6372236073216977, 122.92397745229178',
            'foto' => 'Yc0xFDWOWUKHIsxppbQqfAZ02aeZcgS2oSPbZRdR.jpg',
            'kritik' => 'Bendung Bermasalah tolong segera diperbaiki',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '3',
            'nik' => '145646663678',
            'nama' => 'Fredi merkurius',
            'no_hp' => '0846034543763',
            'koordinat' => '1.0185966120543994, 122.15465232279504',
            'foto' => 'InuIFcfWU4RxIUoOBeKwUjI06TAzxgWotHKbyo4p.jpg',
            'kritik' => 'Pohon tumbang tolong diperbaiki',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '4',
            'nik' => '12674566543678',
            'nama' => 'Messi',
            'no_hp' => '045453473763',
            'koordinat' => '0.66706636587162, 122.55339391262616',
            'foto' => 'ChEcbdMRcw3fkUE6eEZ7RdPPlGx6sJwdtGcgvkGS.jpg',
            'kritik' => 'Saluran tersumbat sampah',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '5',
            'nik' => '1565657736543678',
            'nama' => 'Kabura',
            'no_hp' => '03434303473763',
            'koordinat' => '0.5002384768798697, 121.92304867046934',
            'foto' => 'dCxkw6nNkdalFZt7K7uuXOkAnVYP1oTdB1SHL2c9.jpg',
            'kritik' => 'Saluran tersumbat sampah mohon segera ditinjau',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '6',
            'nik' => '132328736543678',
            'nama' => 'Arman',
            'no_hp' => '767303473763',
            'koordinat' => '0.5207878010005733, 122.15460268128241',
            'foto' => 'tmHXPt1stvzPMKC0gwUxeOsmqGgQ5Dij8B4UfnXV.jpg',
            'kritik' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, in eos maiores totam neque eum quasi quisquam quia suscipit illum molestiae aspernatur quo eaque adipisci facere? Temporibus rerum vero fugit ducimus perferendis quod optio quidem nemo a molestias neque voluptatem aspernatur doloribus adipisci, cupiditate, saepe commodi, tempore repudiandae voluptates architecto. Consequuntur magni dolores deleniti eos corporis officia tempora cumque itaque numquam illo, placeat sequi. Eligendi ipsum neque quaerat corporis totam quod quas, saepe soluta odit accusantium? Dolores adipisci maxime accusantium porro, corrupti recusandae in debitis nostrum et impedit atque deserunt perferendis illo aliquid voluptatibus quo quasi facilis ipsum quos sapiente.',
            'tanggapan' => ''
        ]);
    }
}
