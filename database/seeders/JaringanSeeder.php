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
            'deskripsi' => 'Jaringan irigasi Lomaya Alale merupakan salah satu sistem irigasi penting di Provinsi Gorontalo, khususnya di Kabupaten Bone Bolango. Sistem ini didukung oleh Bendungan Bolango Ulu yang mulai dibangun pada tahun 2019 dan ditargetkan selesai pada tahun 2024. Bendungan ini memiliki kapasitas tampung sebesar 84,10 juta meter kubik dan luas genangan 614,72 hektare. Bendungan ini berfungsi tidak hanya untuk irigasi tetapi juga untuk pengendalian banjir, penyediaan air baku, dan potensi tenaga listrik​.',
            'geojson' => '6631682fe5faf.geojson',
            'foto' => '5MXVhTdZJLAjjdOmUhSSVIjerVwm4xonnEMqmK3B.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '2',
            'deskripsi' => 'Jaringan irigasi Bulango Ulu adalah bagian dari proyek pembangunan Bendungan Bulango Ulu di Kabupaten Bone Bolango, Gorontalo. Pembangunan bendungan ini dimulai sejak 2019 dan ditargetkan selesai pada akhir 2024. Dengan kapasitas tampung sebesar 84,10 juta meter kubik dan luas genangan 483,05 hektare, bendungan ini akan menyediakan irigasi untuk lahan seluas 4.950 hektare, suplai air baku sebanyak 2,2 meter kubik per detik, serta pembangkit listrik tenaga mikrohidro (PLTMH) dengan kapasitas 4,96 MW​.',
            'geojson' => '6631683eab7a2.geojson',
            'foto' => '6js6ZvXpUa3W2PBJ2oeLLYyy1QJa3JLiNGagbUR4.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '3',
            'deskripsi' => 'Jaringan irigasi Bongo terletak di Desa Suka Makmur Utara, Kecamatan Tolangohula, Kabupaten Gorontalo. Proyek rehabilitasi jaringan irigasi ini dimulai pada Mei 2021 dan direncanakan selesai pada November 2021. Dengan anggaran sebesar Rp 8,4 miliar yang bersumber dari Dana Alokasi Khusus (DAK) tahun anggaran 2021, rehabilitasi ini bertujuan untuk memperbaiki dan meningkatkan kapasitas jaringan irigasi sepanjang 14 kilometer agar dapat mengairi lahan pertanian dengan lebih efisien​.',
            'geojson' => '66316847115dd.geojson',
            'foto' => 'cWRpOSdqon4KQNnQtRkMfnryK13JHRb6mYpHACGW.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '4',
            'deskripsi' => 'Jaringan irigasi Bulia berada di Desa Sidodadi, Kecamatan Boliyohuto, Kabupaten Gorontalo. Proyek ini adalah bagian dari komitmen Pemerintah Provinsi Gorontalo untuk meningkatkan produktivitas pertanian dan kesejahteraan petani. Rehabilitasi jaringan irigasi Bulia dimulai pada bulan Mei 2021 dan direncanakan selesai pada bulan November 2021, dengan anggaran sebesar Rp2,2 miliar yang bersumber dari Dana Alokasi Khusus (DAK).',
            'geojson' => '663168511b1e4.geojson',
            'foto' => 'fAvHhuXbLmFZ9FcsTejnnmUx1pln9x6SalRyuesA.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '5',
            'deskripsi' => 'Jaringan irigasi Huludupitango di Gorontalo merupakan proyek penting untuk mendukung pertanian di daerah tersebut. Terletak di Desa Biyonga, Kecamatan Limboto, irigasi ini dirancang untuk mengairi sekitar 1.150 hektar lahan pertanian. Namun, proyek ini menghadapi tantangan serius, terutama selama musim kemarau yang menyebabkan penurunan signifikan pada debit air dari Sungai Biyonga​.',
            'geojson' => '6631685995141.geojson',
            'foto' => 'VwdvAYuS6kfs0vTggA0utmlA4RyqYfP5sBIOtBOr.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '6',
            'deskripsi' => 'Jaringan irigasi Alopohu di Kabupaten Gorontalo merupakan salah satu proyek irigasi penting di provinsi tersebut, yang mengairi sekitar 1.300 hektar lahan pertanian. Daerah ini sangat berpotensi untuk menanam berbagai tanaman pangan seperti padi, ubi kayu, jagung, ubi jalar, kacang kedelai, kacang tanah, buah, dan sayuran',
            'geojson' => '6631686b92bc7.geojson',
            'foto' => 'WNnfWvld9lNXyBCti8FWfVToxLsREDhndmnbch0Y.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '7',
            'deskripsi' => 'Jaringan irigasi Paguyaman adalah salah satu sistem irigasi utama di Provinsi Gorontalo, yang melayani wilayah Kabupaten Gorontalo dan Kabupaten Boalemo. Sistem ini memiliki luas layanan irigasi sebesar 6.880 hektar, yang dibagi menjadi jaringan irigasi kanan dan kiri. Jaringan irigasi kanan melayani sekitar 4.176 hektar, sementara jaringan irigasi kiri melayani 2.704 hektar.',
            'geojson' => '663168789f9b9.geojson',
            'foto' => 'h20Zb0SoyAAxPA9lPsCmcK7qGWflxLUkJhvWikjo.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '8',
            'deskripsi' => 'Jaringan irigasi Tolinggula merupakan bagian dari program rehabilitasi yang bertujuan meningkatkan pembangunan infrastruktur di bidang pertanian di Kabupaten Gorontalo Utara, Provinsi Gorontalo. Setelah direhabilitasi, jaringan ini akan mengairi lahan pertanian seluas 1.180 hektar di wilayah tersebut',
            'geojson' => '6631688206d9e.geojson',
            'foto' => 'Qhp8SClpjXmY7uXXES9nsS2zthtEAc9NUnUvMTMG.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '9',
            'deskripsi' => 'Jaringan irigasi Tabulo Latula di Kabupaten Gorontalo merupakan proyek penting untuk mendukung kegiatan pertanian di wilayah tersebut. Proyek rehabilitasi jaringan irigasi ini bertujuan untuk memperbaiki dan meningkatkan kapasitas saluran irigasi guna memastikan distribusi air yang lebih efektif dan efisien ke lahan pertanian.',
            'geojson' => '6631689259632.geojson',
            'foto' => 'WgLiC2xBXxE0h5h6mI0jnukrY77BLOdZ3pLnm79b.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '10',
            'deskripsi' => 'Daerah Irigasi Randangan terletak di Kabupaten Pohuwato, Provinsi Gorontalo. Pembangunan bendung dan jaringan irigasi Randangan awalnya dijadwalkan selesai pada tahun 2020, namun dengan langkah percepatan, ditargetkan dapat rampung pada akhir tahun 2018.',
            'geojson' => '665c2ba72b8dd.geojson',
            'foto' => '9eQaRdJsTWIYRbW4anQgEsH6ICSmAWyLpIcQan1J.jpg'
        ]);

        Jaringan::create([
            'dirigasi_id' => '11',
            'deskripsi' => 'Pekerjaan rehabilitasi jaringan irigasi Daerah Irigasi (DI) Taluduyunu di Kabupaten Pohuwato, Provinsi Gorontalo, akan dimulai pada awal Juni 2023. Dana Alokasi Khusus (DAK) tahun 2023 sebesar Rp10,4 miliar akan digunakan untuk pekerjaan fisik selama 210 hari kalender kerja. Pekerjaan besar meliputi beton lining sepanjang 4,6 kilometer, pembuatan pintu klep, rehab bendungan, dan jalan inspeksi1.',
            'geojson' => '66553a693d5ad.geojson',
            'foto' => 'g01uGbd7DcQziQk3sLJU5yiJJWiUYXfzTc1UJ2qj.jpg'
        ]);
    }
}
