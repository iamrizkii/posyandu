<?php

namespace Database\Seeders;

use App\Models\Anak;
use App\Models\BukuTamu;
use App\Models\Imunisasi;
use App\Models\JenisImunisasi;
use App\Models\Ortu;
use App\Models\User;
use App\Models\VitaminA;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Users
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'level' => 'admin',
            'email' => 'admin@posyandu.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Bidan Siti',
            'username' => 'bidan',
            'level' => 'bidan',
            'email' => 'bidan@posyandu.com',
            'password' => Hash::make('password')
        ]);

        $userOrtu = User::create([
            'name' => 'Ibu Siti',
            'username' => 'ibusiti',
            'level' => 'ortu',
            'email' => 'ortu@posyandu.com',
            'password' => Hash::make('password')
        ]); // Capture user

        // Create Jenis Imunisasi
        $jenisImunisasis = [
            'Hepatitis B',
            'Polio',
            'BCG',
            'DPT-HB-Hib',
            'Campak',
            'MR (Measles Rubella)',
            'IPV',
            'PCV'
        ];

        foreach ($jenisImunisasis as $nama) {
            JenisImunisasi::create(['nama_imun' => $nama]);
        }

        // Create Ortu (Parents)
        $ortu1 = Ortu::create([
            'user_id' => $userOrtu->id, // Link to User
            'nama_ibu' => 'Siti Aminah',
            'nama_ayah' => 'Budi Santoso',
            'tempat_lhr' => 'Jakarta',
            'tgl_lhr' => '1990-05-15',
            'alamat' => 'Jl. Merdeka No. 123, RT 01/RW 02, Kelurahan Sukamaju',
            'agama' => 'Islam',
            'nik' => '3275051505900001',
            'kk' => '3275051505900001',
            'nohp' => '081234567890'
        ]);

        $ortu2 = Ortu::create([
            'nama_ibu' => 'Dewi Lestari',
            'nama_ayah' => 'Ahmad Hidayat',
            'tempat_lhr' => 'Bandung',
            'tgl_lhr' => '1988-08-20',
            'alamat' => 'Jl. Pahlawan No. 45, RT 03/RW 04, Kelurahan Cempaka',
            'agama' => 'Islam',
            'nik' => '3275052008880002',
            'kk' => '3275052008880002',
            'nohp' => '081298765432'
        ]);

        $ortu3 = Ortu::create([
            'nama_ibu' => 'Maria Kristina',
            'nama_ayah' => 'Yohanes Prasetyo',
            'tempat_lhr' => 'Surabaya',
            'tgl_lhr' => '1992-03-10',
            'alamat' => 'Jl. Kenanga No. 78, RT 05/RW 06, Kelurahan Melati',
            'agama' => 'Kristen',
            'nik' => '3275051003920003',
            'kk' => '3275051003920003',
            'nohp' => '081355566677'
        ]);

        // Create Anak (Children)
        $anak1 = Anak::create([
            'ortu_id' => $ortu1->id,
            'nama_anak' => 'Andi Pratama',
            'tempat_lhr' => 'Jakarta',
            'tgl_lhr' => '2023-01-15',
            'bb_lhr' => 3.2,
            'tb_lhr' => 50,
            'jenis_kelamin' => 'Laki-laki',
            'anak_ke' => 1,
            'nik_anak' => '3275051501230001',
            'bpjs_anak' => '0001234567890'
        ]);

        $anak2 = Anak::create([
            'ortu_id' => $ortu1->id,
            'nama_anak' => 'Sari Wulandari',
            'tempat_lhr' => 'Jakarta',
            'tgl_lhr' => '2024-06-20',
            'bb_lhr' => 2.9,
            'tb_lhr' => 48,
            'jenis_kelamin' => 'Perempuan',
            'anak_ke' => 2,
            'nik_anak' => '3275052006240002',
            'bpjs_anak' => '0001234567891'
        ]);

        $anak3 = Anak::create([
            'ortu_id' => $ortu2->id,
            'nama_anak' => 'Rizki Pratama',
            'tempat_lhr' => 'Bandung',
            'tgl_lhr' => '2022-09-05',
            'bb_lhr' => 3.5,
            'tb_lhr' => 52,
            'jenis_kelamin' => 'Laki-laki',
            'anak_ke' => 1,
            'nik_anak' => '3275050509220003',
            'bpjs_anak' => '0001234567892'
        ]);

        $anak4 = Anak::create([
            'ortu_id' => $ortu3->id,
            'nama_anak' => 'Yolanda Sari',
            'tempat_lhr' => 'Surabaya',
            'tgl_lhr' => '2025-02-14',
            'bb_lhr' => 3.0,
            'tb_lhr' => 49,
            'jenis_kelamin' => 'Perempuan',
            'anak_ke' => 1,
            'nik_anak' => '3275051402250004',
            'bpjs_anak' => '0001234567893'
        ]);

        // Anak yang tidak dapat diimunisasi (usia > 5 tahun)
        $anak5 = Anak::create([
            'ortu_id' => $ortu2->id,
            'nama_anak' => 'Dimas Kurniawan',
            'tempat_lhr' => 'Bandung',
            'tgl_lhr' => '2018-04-10',
            'bb_lhr' => 3.3,
            'tb_lhr' => 51,
            'jenis_kelamin' => 'Laki-laki',
            'anak_ke' => 2,
            'nik_anak' => '3275051004180005',
            'bpjs_anak' => '0001234567894'
        ]);

        // Create Imunisasi records
        Imunisasi::create([
            'jenisimunisasi_id' => 1, // Hepatitis B
            'anak_id' => $anak1->id,
            'tgl_imun' => '2023-01-16',
            'booster' => 'Tidak',
            'ket_imun' => 'Imunisasi pertama setelah lahir'
        ]);

        Imunisasi::create([
            'jenisimunisasi_id' => 3, // BCG
            'anak_id' => $anak1->id,
            'tgl_imun' => '2023-02-15',
            'booster' => 'Tidak',
            'ket_imun' => 'Imunisasi BCG'
        ]);

        Imunisasi::create([
            'jenisimunisasi_id' => 2, // Polio
            'anak_id' => $anak1->id,
            'tgl_imun' => '2023-02-15',
            'booster' => 'Tidak',
            'ket_imun' => 'Polio 1'
        ]);

        Imunisasi::create([
            'jenisimunisasi_id' => 4, // DPT-HB-Hib
            'anak_id' => $anak3->id,
            'tgl_imun' => '2022-11-05',
            'booster' => 'Tidak',
            'ket_imun' => 'DPT-HB-Hib 1'
        ]);

        Imunisasi::create([
            'jenisimunisasi_id' => 5, // Campak
            'anak_id' => $anak5->id,
            'tgl_imun' => '2019-04-10',
            'booster' => 'Ya',
            'ket_imun' => 'Campak booster'
        ]);

        // Create Vitamin A records
        VitaminA::create([
            'anak_id' => $anak1->id,
            'tgl' => '2023-08-15',
            'keterangan' => 'Vitamin A Merah'
        ]);

        VitaminA::create([
            'anak_id' => $anak3->id,
            'tgl' => '2023-08-15',
            'keterangan' => 'Vitamin A Biru'
        ]);

        // Create Buku Tamu
        BukuTamu::create([
            'nama_tamu' => 'Dr. Hendra',
            'alamat' => 'Puskesmas Sukamaju',
            'jabatan' => 'Dokter',
            'keperluan' => 'Pemantauan kegiatan posyandu'
        ]);

        BukuTamu::create([
            'nama_tamu' => 'Ibu Ratna',
            'alamat' => 'RT 02 RW 03',
            'jabatan' => 'Warga',
            'keperluan' => 'Konsultasi kesehatan anak'
        ]);
    }
}
