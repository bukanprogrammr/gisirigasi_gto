<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sawah;
use App\Models\Bendung;
use App\Models\Kabkota;
use App\Models\Dirigasi;
use App\Models\Jaringan;
use App\Models\Masyarakat;
use App\Models\Kabkotadirigasi;
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

        //user
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        //kabkota
        Kabkota::create([
            'id' => '1',
            'nama_kabkota' => 'Kota Gorontalo',
            'warna' => '#A1FDFD',
            'geojson' => 'geojson-kabkota/662a0743a9641.geojson',
        ]);
        Kabkota::create([
            'id' => '2',
            'nama_kabkota' => 'Kab. Bone Bolango',
            'warna' => '#98F9A1',
            'geojson' => 'geojson-kabkota/662a074f159b9.geojson',
        ]);
        Kabkota::create([
            'id' => '3',
            'nama_kabkota' => 'Kab. Gorontalo',
            'warna' => '#FDB3D3',
            'geojson' => 'geojson-kabkota/662a07573355b.geojson',
        ]);
        Kabkota::create([
            'id' => '4',
            'nama_kabkota' => 'Kab. Gorontalo Utara',
            'warna' => '#FDFDB3',
            'geojson' => 'geojson-kabkota/662a07761deef.geojson',
        ]);
        Kabkota::create([
            'id' => '5',
            'nama_kabkota' => 'Kab. Boalemo',
            'warna' => '#FDCCB3',
            'geojson' => 'geojson-kabkota/662a075f21c91.geojson',
        ]);
        Kabkota::create([
            'id' => '6',
            'nama_kabkota' => 'Kab. Pohuwato',
            'warna' => '#B3B7FD',
            'geojson' => 'geojson-kabkota/662a0766d071f.geojson',
        ]);

        //dirigasi
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

        //bendung
        Bendung::create([
            'dirigasi_id' => '1',
            'koordinat' => '0.6284881611614664, 123.08301541968466',
            'foto' => 'foto-bendung/ukSUzxZky0CoBL2eMLU0iviogVwdIlhcYI1KVPNz.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '1',
            'koordinat' => '0.5383426361484803, 123.17264111615152',
            'foto' => 'foto-bendung/Z3NMZEfCGRdUheI9kUwMa9V5pXNDyCADFYKPiXke.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '2',
            'koordinat' => '0.6645738934100373, 123.09544158516417',
            'foto' => 'foto-bendung/kqKG3LC5yqoOrNwOvhPnbB9LLnT3TSlXoPj4zVJ5.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '3',
            'koordinat' => '0.755328494227044, 122.55543195881081',
            'foto' => 'foto-bendung/ddDLqLKHPnkO9oG3l3GslfXNimpu2HoiA1JNehIf.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '4',
            'koordinat' => '0.6609604368058172, 123.09525194022662',
            'foto' => 'foto-bendung/tT0qV4fRpyRvgPgVPhPpEzRnhyYE7EWGTasveXQz.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '5',
            'koordinat' => '0.6694855917403749, 122.98380474696388',
            'foto' => 'foto-bendung/aClxbREQZZWehuSjwkNPcOy8SimEhZvsHbnWZHnP.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '6',
            'koordinat' => '0.6330305960416549, 122.89001366509905',
            'foto' => 'foto-bendung/QGo4IFjsCQa4upR4tzYv9xNw1ukRFakB9kzSWIZi.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '7',
            'koordinat' => '0.791474736086587, 122.44996678486562',
            'foto' => 'foto-bendung/iUnsKFbIaGqMihGhBY1wmUpyE543ljFR77101lwM.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '8',
            'koordinat' => '1.0105445120097782, 122.1141083004484',
            'foto' => 'foto-bendung/mmiFnCVpcOPkvJ4acdNxuqHHv6j869TBRHlvY5uJ.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '9',
            'koordinat' => '0.5119033221588665, 123.05722590836082',
            'foto' => 'foto-bendung/ydJaE6YsBJozpdkxYPGr1jM06T3Zb8LzcCL3141B.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '10',
            'koordinat' => '0.5918710986797192, 121.8244324498817',
            'foto' => 'foto-bendung/5G0ENaXJqXa7buiImlnuaVxasnmLqchfKo12j0XE.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '11',
            'koordinat' => '0.5606719642792427, 121.95354938037993',
            // 'foto' => 'foto-bendung/q9mYG1jh1KX8sbAMwW5bdnOKxSwkLodOW5WuzNrq.jpg'
        ]);

        //sawah
        Sawah::create([
            'kabkota_id' => '3',
            'geojson' => 'geojson-sawah/66257c51bfe7e.geojson'
        ]);

        Sawah::create([
            'kabkota_id' => '1',
            'geojson' => 'geojson-sawah/66257fb05ec9b.geojson'
        ]);

        Sawah::create([
            'kabkota_id' => '3',
            'geojson' => 'geojson-sawah/66257fb05ec9b.geojson'
        ]);

        //Jaringan
        Jaringan::create([
            'dirigasi_id' => '1',
            'geojson' => 'geojson-jaringan/6631682fe5faf.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '2',
            'geojson' => 'geojson-jaringan/6631683eab7a2.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '3',
            'geojson' => 'geojson-jaringan/66316847115dd.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '4',
            'geojson' => 'geojson-jaringan/663168511b1e4.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '5',
            'geojson' => 'geojson-jaringan/6631685995141.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '6',
            'geojson' => 'geojson-jaringan/6631686b92bc7.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '7',
            'geojson' => 'geojson-jaringan/663168789f9b9.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '8',
            'geojson' => 'geojson-jaringan/6631688206d9e.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '9',
            'geojson' => 'geojson-jaringan/6631689259632.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '10',
            'geojson' => 'geojson-jaringan/6631689c208e5.geojson'
        ]);

        Jaringan::create([
            'dirigasi_id' => '11',
            'geojson' => 'geojson-jaringan/663168d5499f4.geojson'
        ]);

        //masyarakat
        Masyarakat::create([
            'id' => '1',
            'nik' => '1928736543678',
            'nama' => 'pulu',
            'no_hp' => '082303473763',
            'koordinat' => '0.6162370562318944, 123.0862049481897',
            'foto' => 'foto-masalah/xelCkBG963uEpjzWv9hHaEfmrqzKfDrgEDi5y0tg.jpg',
            'kritik' => 'Saluran Irigasi Bermasalah tolong segera diperbaiki',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '2',
            'nik' => '156876536543678',
            'nama' => 'bibi lung',
            'no_hp' => '06565473763',
            'koordinat' => '0.6372236073216977, 122.92397745229178',
            'foto' => 'foto-masalah/Yc0xFDWOWUKHIsxppbQqfAZ02aeZcgS2oSPbZRdR.jpg',
            'kritik' => 'Bendung Bermasalah tolong segera diperbaiki',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '3',
            'nik' => '145646663678',
            'nama' => 'Fredi merkurius',
            'no_hp' => '0846034543763',
            'koordinat' => '1.0185966120543994, 122.15465232279504',
            'foto' => 'foto-masalah/InuIFcfWU4RxIUoOBeKwUjI06TAzxgWotHKbyo4p.jpg',
            'kritik' => 'Pohon tumbang sup kase bae kamari dlu pipa so bocorrr',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '4',
            'nik' => '12674566543678',
            'nama' => 'Messi',
            'no_hp' => '045453473763',
            'koordinat' => '0.66706636587162, 122.55339391262616',
            'foto' => 'foto-masalah/xelCkBG963uEpjzWv9hHaEfmrqzKfDrgEDi5y0tg.jpg',
            'kritik' => 'Tabulo Bermasalah tolong segera diperbaiki uwticchhh',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '5',
            'nik' => '1565657736543678',
            'nama' => 'Kabura',
            'no_hp' => '03434303473763',
            'koordinat' => '0.5002384768798697, 121.92304867046934',
            'foto' => 'foto-masalah/dCxkw6nNkdalFZt7K7uuXOkAnVYP1oTdB1SHL2c9.jpg',
            'kritik' => 'Kase bae akan dlu ini got syuupp so ta sumbat syuuppp',
            'tanggapan' => ''
        ]);

        Masyarakat::create([
            'id' => '6',
            'nik' => '132328736543678',
            'nama' => 'Arman',
            'no_hp' => '767303473763',
            'koordinat' => '0.5207878010005733, 122.15460268128241',
            'foto' => 'foto-masalah/tmHXPt1stvzPMKC0gwUxeOsmqGgQ5Dij8B4UfnXV.jpg',
            'kritik' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, in eos maiores totam neque eum quasi quisquam quia suscipit illum molestiae aspernatur quo eaque adipisci facere? Temporibus rerum vero fugit ducimus perferendis quod optio quidem nemo a molestias neque voluptatem aspernatur doloribus adipisci, cupiditate, saepe commodi, tempore repudiandae voluptates architecto. Consequuntur magni dolores deleniti eos corporis officia tempora cumque itaque numquam illo, placeat sequi. Eligendi ipsum neque quaerat corporis totam quod quas, saepe soluta odit accusantium? Dolores adipisci maxime accusantium porro, corrupti recusandae in debitis nostrum et impedit atque deserunt perferendis illo aliquid voluptatibus quo quasi facilis ipsum quos sapiente.',
            'tanggapan' => ''
        ]);

        //kabkotadirigasi
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
