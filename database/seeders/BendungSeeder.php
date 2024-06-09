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
            'nama_bendung' => 'Lomaya',
            'koordinat' => '0.6284881611614664, 123.08301541968466',
            'deskripsi' => 'Bendungan Lomaya merupakan sebuah stasiun pengendali air yang dibuat di atas konstruksi beton memotong aliran Sungai Bone Bolango yang kemudian pada salah satu sisi sudutnya dibuat pintu air berbentuk huruf L terbalik. Bendungan Lomaya ini dibuat pada tahun 1921 oleh Belanda ketika masih berkuasa di Gorontalo. Namun ada bukti yang cukup kuat untuk mengatakan bahwa bendungan ini telah berumur cukup dengan adanya foto yang berasal dari tahun 1958 dimana Letnan Jenderal Gatot Subroto pernah mengunjunginya ketika pergolakan Permesta berlangsung di daerah ini.',
            'foto' => 'ukSUzxZky0CoBL2eMLU0iviogVwdIlhcYI1KVPNz.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '1',
            'nama_bendung' => 'Alale',
            'koordinat' => '0.5342155835872361, 123.17252935034057',
            'deskripsi' => 'Bendungan Alale merupakan salah satu bendungan yang besar di kabupaten Bone Bolango yang berada di Desa Alale Kecamatan Suwawa.  Menurut BP-DAS Propinsi Gorontalo (2014) DAS Bone merupakan sungai DAS terluas di kabupaten Bone Bolango dengan luas DAS 132.587 ha, keliling 218.869 m dan panjang sungai 2.655.440 m.  Luas lahan sawah yang ada di DAS bone yaitu 5.176 ha dan lahan perkebunan 1.591 ha.',
            'foto' => 'Z3NMZEfCGRdUheI9kUwMa9V5pXNDyCADFYKPiXke.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '2',
            'nama_bendung' => 'Bulango Ulu',
            'koordinat' => '0.6608458385253215, 123.09519589534287',
            'deskripsi' => 'Bendungan Bulango Ulu ini dibangun memakai tipe urugan batu dengan inti tegak dengan luas genangan hingga 614,72 hektare. Selain dapat menyuplai air irigisi, bendungan ini juga dapat bermanfaat sebagai pengendali banjir di wilayah hilir Sungai Bolango sebanyak 403,31 m3 per detik. Diketahui juga bahwa bendungan ini nantinya dapat mereduksi banjir sebesar 85,38 persen. Sedangkan untuk sumber air yang ditampung sendiri dari DAS Bolango dengan luas 243,19 kilometer persegi. Tak hanya itu, bendungan ini juga nantinya berpotensi sebagai pembangkit listrik tenaga air dengan kapasitas 4,96 Megawatt serta dapat bermanfaat sebagai penyuplai air baku yang bisa menghasilkan 2,2 meter kubik perdetik.',
            'foto' => 'kqKG3LC5yqoOrNwOvhPnbB9LLnT3TSlXoPj4zVJ5.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '3',
            'nama_bendung' => 'Bongo',
            'koordinat' => '0.7435266367986644, 122.5546561089742',
            'deskripsi' => 'Kondisi Bendungan Bongo yang terletak di Desa Binajaya, Kecamatan Tolangohula, Kabupaten Gorontalo saat ini semakin memprihatinkan. Pasalnya, dalam beberapa tahun terakhir bendungan yang menjadi sumber air persawahan di empat Desa tersebut sudah semakin dangkal. Terkait hal ini, Kepala Desa Binajaya, Iwan R. Polumulo menjelaskan kondisi itu diakibatkan aktivitas pertambangan ilegal yang berlokasi diperbatasan Desa Binajaya dan Tamaila. Tidak hanya berdampak pada dangkalnya bendungan, kata Iwan, tanah dari aktivitas pertambangan ini juga menimbun saluran air bendungan Bongo dan persawahan masyarakat di Desa Binajaya, Molohu; Sukamakmur Utara dan Gandasari.',
            'foto' => 'ddDLqLKHPnkO9oG3l3GslfXNimpu2HoiA1JNehIf.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '4',
            'nama_bendung' => 'Bulia',
            'koordinat' => '0.702536065925084, 122.64134759224723',
            'deskripsi' => 'Bendungan Bulia merupakan sumber pengairan utama untuk lahan sawah di Kecamatan Mootilango. Berdasarkan data Badan Pusat Statistik Kabupaten Gorontalo, lahan sawah di Mootilango seluas 2.641 hektar. Dari jumlah tersebut seluas 1.503 memanfaatkan pengairan dari bendungan Bulia, dan sisanya 569 hektar merupakan sawah tadah hujan.',
            'foto' => 'tT0qV4fRpyRvgPgVPhPpEzRnhyYE7EWGTasveXQz.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '5',
            'nama_bendung' => 'Huludupitango',
            'koordinat' => '0.6625214921579282, 122.98500086266404',
            'deskripsi' => 'Bendung Huludupitango memanfaatkan air dari Sungai Biyonga untuk mengairi lahan irigasi seluas 1.150 ha sawah fungsional di daerah irigasi desa Biyonga dan sekitarnya.',
            'foto' => 'aClxbREQZZWehuSjwkNPcOy8SimEhZvsHbnWZHnP.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '6',
            'nama_bendung' => 'Alopohu',
            'koordinat' => '0.6221932382589458, 122.88986263861716',
            'deskripsi' => 'Bendung Alopohu adalah bendung dengan gabungan aliran sungai Alo dan Pohu. Bendung alopohu berdiri pada tahun 2013. Debit musim kering pada bulan Mei 2017 adalah 1494 l/dt. ',
            'foto' => 'QGo4IFjsCQa4upR4tzYv9xNw1ukRFakB9kzSWIZi.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '6',
            'nama_bendung' => 'Alo',
            'koordinat' => '0.6536555801814138, 122.85814682323247',
            'deskripsi' => 'Bendung Alo sangat berguna sebagai penunjang kegiatan di bidang pertanian bagi masyarakat sekitar, yakni Desa Hutabohu dan Desa Yosonegoro. Total luas lahan fungsional adalah 1.482 ha sedangkan luas potensial sawah adalah 1.800 ha. ',
            'foto' => 'QGo4IFjsCQa4upR4tzYv9xNw1ukRFakB9kzSWIZi.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '7',
            'nama_bendung' => 'Paguyaman',
            'koordinat' => '0.7571602248096915, 122.44903319074686',
            'deskripsi' => 'Bendung Paguyaman, salah satu bendung terbesar di Provinsi Gorontalo tepatnya di Desa Karya Indah, Kecamatan Asparaga, Kabupaten Gorontalo. Bendung yang pembangunannya dimulai pada tahun 2005 dan diresmikan pada tahun 2010 ini mengairi daerah irigasi Paguyaman kiri seluas 2.704 ha yang berada di Kabupaten Gorontalo dan daerah irigasi Paguyaman kanan seluas 4.176 ha yang berada di wilayah Kabupaten Boalemo.',
            'foto' => 'iUnsKFbIaGqMihGhBY1wmUpyE543ljFR77101lwM.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '8',
            'nama_bendung' => 'Tolinggula',
            'koordinat' => '0.9992527888344247, 122.11280355891704',
            'deskripsi' => 'Bendung Tolinggula terletak di Kecamatan Tolinggula, Kabupaten Gorontalo Utara, dan baru-baru ini menjadi sorotan akibat banjir bandang yang melanda wilayah tersebut. Banjir ini disebabkan oleh jebolnya tanggul pengaman banjir di DAS Tolinggula, yang dipicu oleh hujan deras. Akibatnya, ribuan warga dari beberapa desa di kecamatan ini terdampak, dengan banyak rumah terendam banjir',
            'foto' => 'mmiFnCVpcOPkvJ4acdNxuqHHv6j869TBRHlvY5uJ.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '9',
            'nama_bendung' => 'Tabulo Latula',
            'koordinat' => '0.526718109545547, 122.15524932473429',
            'deskripsi' => 'Bendung Tabulo Latula, terletak di Desa Tabulo, Kecamatan Mananggu, Kabupaten Boalemo, Provinsi Gorontalo, merupakan salah satu proyek infrastruktur yang penting di daerah tersebut. Proyek ini dibangun untuk mengatasi masalah banjir yang sering terjadi saat musim hujan dan untuk mengelola sumber daya air secara lebih efektif. Pemerintah Provinsi Gorontalo melalui Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) telah berupaya memperkuat pengamanan badan sungai di area ini untuk mencegah banjir yang merugikan warga setempat',
            'foto' => 'ydJaE6YsBJozpdkxYPGr1jM06T3Zb8LzcCL3141B.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '10',
            'nama_bendung' => 'Randangan',
            'koordinat' => '0.5613921882907059, 121.82369339098518',
            'deskripsi' => 'Bendungan Randangan dipersiapkan secara teknis untuk dapat mengairi areal seluas kurang lebih 8.900 hektar sehingga, dengan kapasitas ini dipastikan Kabupaten Pohuwato akan mampu menjadi sentra penghasil dan pemasok kebutuhan pangan di wilayah Gorontalo.',
            'foto' => '5G0ENaXJqXa7buiImlnuaVxasnmLqchfKo12j0XE.jpg'
        ]);

        Bendung::create([
            'dirigasi_id' => '11',
            'nama_bendung' => 'Taluduyunu',
            'koordinat' => '0.5138540997117546, 121.95488801311754',
            'deskripsi' => 'Bendungan Taluduyunu, yang terletak di Kecamatan Duhiadaa dan Taluduyunu, Pohuwato, telah selesai dibangun. Bendungan ini khusus untuk mengaliri sawah dan membantu petani yang selama ini mengalami kekeringan dan gagal panen. Bendungan ini mulai beroperasi pada awal Januari 2024. Sejumlah petani berharap bendungan ini dapat berfungsi dengan baik dan tetap menjadikan Buntulia dan Duhiadaa sebagai lumbung beras di kabupaten Pohuwato.',
            'foto' => 'rg8RU3VAbvl2G80HDODlWuHBVk7sgXef9MSoCxvQ.jpg'
        ]);
    }
}
