<?php

namespace Database\Seeders;

use App\Models\Bendung;
use Illuminate\Database\Seeder;

class BendungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bendung::create([
            'dirigasi_id' => '1',
            'koordinat' => '0.6284881611614664, 123.08301541968466',
            'foto' => 'ukSUzxZky0CoBL2eMLU0iviogVwdIlhcYI1KVPNz.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '1',
            'koordinat' => '0.5342155835872361, 123.17252935034057',
            'foto' => 'Z3NMZEfCGRdUheI9kUwMa9V5pXNDyCADFYKPiXke.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '2',
            'koordinat' => '0.6645738934100373, 123.09544158516417',
            'foto' => 'kqKG3LC5yqoOrNwOvhPnbB9LLnT3TSlXoPj4zVJ5.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '3',
            'koordinat' => '0.7435266367986644, 122.5546561089742',
            'foto' => 'ddDLqLKHPnkO9oG3l3GslfXNimpu2HoiA1JNehIf.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '4',
            'koordinat' => '0.702536065925084, 122.64134759224723',
            'foto' => 'tT0qV4fRpyRvgPgVPhPpEzRnhyYE7EWGTasveXQz.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '5',
            'koordinat' => '0.6625214921579282, 122.98500086266404',
            'foto' => 'aClxbREQZZWehuSjwkNPcOy8SimEhZvsHbnWZHnP.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '6',
            'koordinat' => '0.6221932382589458, 122.88986263861716',
            'foto' => 'QGo4IFjsCQa4upR4tzYv9xNw1ukRFakB9kzSWIZi.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '6',
            'koordinat' => '0.6536555801814138, 122.85814682323247',
            'foto' => 'QGo4IFjsCQa4upR4tzYv9xNw1ukRFakB9kzSWIZi.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '7',
            'koordinat' => '0.7571602248096915, 122.44903319074686',
            'foto' => 'iUnsKFbIaGqMihGhBY1wmUpyE543ljFR77101lwM.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '8',
            'koordinat' => '0.9992527888344247, 122.11280355891704',
            'foto' => 'mmiFnCVpcOPkvJ4acdNxuqHHv6j869TBRHlvY5uJ.jpg'
        ]);

        // Bendung::create([
        //     'dirigasi_id' => '9',
        //     'koordinat' => '0.5119033221588665, 123.05722590836082',
        //     'foto' => 'ydJaE6YsBJozpdkxYPGr1jM06T3Zb8LzcCL3141B.jpg'
        // ]);

        Bendung::create([
            'dirigasi_id' => '10',
            'koordinat' => '0.5613921882907059, 121.82369339098518',
            'foto' => '5G0ENaXJqXa7buiImlnuaVxasnmLqchfKo12j0XE.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '11',
            'koordinat' => '0.5138540997117546, 121.95488801311754',
            // 'foto' => 'q9mYG1jh1KX8sbAMwW5bdnOKxSwkLodOW5WuzNrq.jpg'
        ]);
    }
}
