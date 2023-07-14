<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Psikolog;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);'

        User::create([
            'name' => 'Zitha',
            'email' => 'zitha@gmail.com',
            'username' => 'zitha',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'admin',
            'foto' => 'foto-profil/OxImynHEbiDCx9B34DVzHPHRgm0m5pmEEmrLbOOx.png',
        ]);

        User::create([
            'name' => 'Derisa',
            'email' => 'derisa@gmail.com',
            'username' => 'derisa',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'member',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);


        User::create([
            'name' => 'INHEKE SALMAN, S.PSI., M.PSI.', //
            'email' => 'inheke@gmail.com',
            'username' => 'inheke',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'FRANDYKA DWIARMA, S.PSI., M.PSI', //FDA
            'email' => 'kdyka@gmail.com',
            'username' => 'kdyka',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'Bunis', //MQA
            'email' => 'bunis@gmail.com',
            'username' => 'bunis',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'YULIA IRAWATI, S.PSI., M.PSI.', //YUI
            'email' => 'yui@gmail.com',
            'username' => 'yui',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'FAHMI MAHMUDAYATI PRATIWI, S.PSI., M.PSI', // MIA
            'email' => 'mia@gmail.com',
            'username' => 'mia',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'PRASETYO ADI NUGROHO, S.PSI., M.PSI.', //PRS
            'email' => 'prast@gmail.com',
            'username' => 'prast',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'ALVIANA NUR LINDASARI, A.MD.KES', //LND
            'email' => 'linda@gmail.com',
            'username' => 'linda',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'LARISSA INARAH, S.PSI., M.PSI.,', //ICA
            'email' => 'ica@gmail.com',
            'username' => 'ica',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'IDR',
            'email' => 'idr@gmail.com',
            'username' => 'idr',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'WULAN SUFIANI FAUZIAH, S.PSI.', //WLN
            'email' => 'wulan@gmail.com',
            'username' => 'wulan',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'NISA MUTMAINNAH UKHFI, S.PSI., M.PSI', //
            'email' => 'nisa@gmail.com',
            'username' => 'nisa',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'WIJAYANTI INDRASWATI D, S.PSI., M.PSI.,', //
            'email' => 'wijayanti@gmail.com',
            'username' => 'wijayanti',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'DYAH RACHMAN K, S.PSI., M.PSI.', //
            'email' => 'tdyah@gmail.com',
            'username' => 'tdyah',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'psikolog', //
            'email' => 'psikolog4@gmail.com',
            'username' => 'psikolog4',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'Psikolog',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);

        User::create([
            'name' => 'Member Nakal',
            'email' => 'member_nakal@gmail.com',
            'username' => 'member_nakal',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'member',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);
        User::create([
            'name' => 'Member Baik',
            'email' => 'member_baik@gmail.com',
            'username' => 'member_baik',
            'tanggal_lahir' => '2022-02-18',
            'no_hp' => '+62 813-8087-6176',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Bandung',
            'password' => Hash::make('asdasd'),
            'role' => 'member',
            'foto' => 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png',
        ]);

        Member::create([
            'user_id' => 2,
            'pekerjaan' => 'Mahasiswa',
        ]);
        Psikolog::create([
            'user_id' => 3,
            'kode_psikolog' => 'ISA',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 4,
            'kode_psikolog' => 'FDA',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 5,
            'kode_psikolog' => 'MQA',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 6,
            'kode_psikolog' => 'YUI',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 7,
            'kode_psikolog' => 'MIA',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 8,
            'kode_psikolog' => 'PRS',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 9,
            'kode_psikolog' => 'LND',
            'jenis_keahlian' => 'Kesehatan',
        ]);
        Psikolog::create([
            'user_id' => 10,
            'kode_psikolog' => 'ICA',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 11,
            'kode_psikolog' => 'IDR',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 12,
            'kode_psikolog' => 'WLN',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 13,
            'kode_psikolog' => 'NMU',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 14,
            'kode_psikolog' => 'WID',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 15,
            'kode_psikolog' => 'DRK',
            'jenis_keahlian' => 'Psikolog',
        ]);
        Psikolog::create([
            'user_id' => 16,
            'kode_psikolog' => 'LKL',
            'jenis_keahlian' => 'Psikolog',
        ]);

        Member::create([
            'user_id' => 17,
            'pekerjaan' => 'Mahasiswa',
        ]);

        Member::create([
            'user_id' => 18,
            'pekerjaan' => 'Mahasiswa',
        ]);

        Ruangan::create([
            'ruangan' => 'Ruang Fajar'
        ]);
        Ruangan::create([
            'ruangan' => 'Ruang Senja'
        ]);
        Ruangan::create([
            'ruangan' => 'Kelas Matahari'
        ]);
        Ruangan::create([
            'ruangan' => 'Kelas Bulan'
        ]);



        Jadwal::create([
            'psikolog_id' => 3, //MQA
            'hari' => 'Selasa',
            'jam_mulai' => '08:00',
            'jam_selesai' => '08:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 6, //PRAST
            'hari' => 'Selasa',
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:20',
        ]);

        Jadwal::create([
            'psikolog_id' => 6, //PRAST
            'hari' => 'Selasa',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);

        Jadwal::create([
            'psikolog_id' => 5, //
            'hari' => 'Selasa',
            'jam_mulai' => '10:00',
            'jam_selesai' => '10:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 3,
            'hari' => 'Selasa',
            'jam_mulai' => '11:00',
            'jam_selesai' => '11:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Selasa',
            'jam_mulai' => '13:00',
            'jam_selesai' => '13:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Selasa',
            'jam_mulai' => '13:30',
            'jam_selesai' => '14:50',
        ]);

        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Selasa',
            'jam_mulai' => '14:00',
            'jam_selesai' => '14:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Selasa',
            'jam_mulai' => '15:00',
            'jam_selesai' => '14:50',
        ]);

        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Selasa',
            'jam_mulai' => '15:00',
            'jam_selesai' => '15:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Selasa',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Selasa',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Selasa',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Selasa',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Selasa',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);

        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Kamis',
            'jam_mulai' => '13:30',
            'jam_selesai' => '14:50',
        ]);

        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Kamis',
            'jam_mulai' => '15:00',
            'jam_selesai' => '14:50',
        ]);

        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Sabtu',
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:20',
        ]);
        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Sabtu',
            'jam_mulai' => '09:20',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Sabtu',
            'jam_mulai' => '13:30',
            'jam_selesai' => '14:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 1,
            'hari' => 'Sabtu',
            'jam_mulai' => '15:00',
            'jam_selesai' => '16:20',
        ]);

        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Rabu',
            'jam_mulai' => '10:00',
            'jam_selesai' => '10:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Rabu',
            'jam_mulai' => '11:00',
            'jam_selesai' => '11:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Jumat',
            'jam_mulai' => '09:00',
            'jam_selesai' => '09:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Jumat',
            'jam_mulai' => '10:00',
            'jam_selesai' => '10:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Jumat',
            'jam_mulai' => '14:00',
            'jam_selesai' => '14:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Jumat',
            'jam_mulai' => '15:00',
            'jam_selesai' => '16:20',
        ]);

        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Sabtu',
            'jam_mulai' => '10:00',
            'jam_selesai' => '10:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 2,
            'hari' => 'Sabtu',
            'jam_mulai' => '11:00',
            'jam_selesai' => '11:55',
        ]);




        Jadwal::create([
            'psikolog_id' => 3,
            'hari' => 'Kamis',
            'jam_mulai' => '11:00',
            'jam_selesai' => '11:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 3,
            'hari' => 'Kamis',
            'jam_mulai' => '15:00',
            'jam_selesai' => '15:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 3,
            'hari' => 'Jumat',
            'jam_mulai' => '10:00',
            'jam_selesai' => '10:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 3,
            'hari' => 'Jumat',
            'jam_mulai' => '11:00',
            'jam_selesai' => '11:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 3,
            'hari' => 'Jumat',
            'jam_mulai' => '13:30',
            'jam_selesai' => '14:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 3,
            'hari' => 'Jumat',
            'jam_mulai' => '15:00',
            'jam_selesai' => '16:50',
        ]);


        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Kamis',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Kamis',
            'jam_mulai' => '11:00',
            'jam_selesai' => '12:20',
        ]);
        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Kamis',
            'jam_mulai' => '15:00',
            'jam_selesai' => '16:20',
        ]);

        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Jumat',
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:20',
        ]);
        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Jumat',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Jumat',
            'jam_mulai' => '15:00',
            'jam_selesai' => '16:20',
        ]);

        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Sabtu',
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:20',
        ]);
        Jadwal::create([
            'psikolog_id' => 4,
            'hari' => 'Sabtu',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);


        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Rabu',
            'jam_mulai' => '09:00',
            'jam_selesai' => '09:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Rabu',
            'jam_mulai' => '10:00',
            'jam_selesai' => '10:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Rabu',
            'jam_mulai' => '13:00',
            'jam_selesai' => '13:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Rabu',
            'jam_mulai' => '14:00',
            'jam_selesai' => '14:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 5,
            'hari' => 'Kamis',
            'jam_mulai' => '15:00',
            'jam_selesai' => '15:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 6,
            'hari' => 'Rabu',
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:20',
        ]);

        Jadwal::create([
            'psikolog_id' => 6,
            'hari' => 'Rabu',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);

        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Kamis',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Kamis',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Kamis',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Kamis',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 7,
            'hari' => 'Kamis',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:50',
        ]);


        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Kamis',
            'jam_mulai' => '09:00',
            'jam_selesai' => '09:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Kamis',
            'jam_mulai' => '10:00',
            'jam_selesai' => '10:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Kamis',
            'jam_mulai' => '13:00',
            'jam_selesai' => '13:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Kamis',
            'jam_mulai' => '14:00',
            'jam_selesai' => '14:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Jumat',
            'jam_mulai' => '09:00',
            'jam_selesai' => '09:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Jumat',
            'jam_mulai' => '11:00',
            'jam_selesai' => '11:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Jumat',
            'jam_mulai' => '13:00',
            'jam_selesai' => '13:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 8,
            'hari' => 'Jumat',
            'jam_mulai' => '14:00',
            'jam_selesai' => '14:55',
        ]);

        Jadwal::create([
            'psikolog_id' => 9,
            'hari' => 'Sabtu',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 9,
            'hari' => 'Sabtu',
            'jam_mulai' => '11:00',
            'jam_selesai' => '12:20',
        ]);
        Jadwal::create([
            'psikolog_id' => 9,
            'hari' => 'Sabtu',
            'jam_mulai' => '13:30',
            'jam_selesai' => '14:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 9,
            'hari' => 'Sabtu',
            'jam_mulai' => '15:00',
            'jam_selesai' => '16:20',
        ]);

        Jadwal::create([
            'psikolog_id' => 10,
            'hari' => 'Sabtu',
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:20',
        ]);
        Jadwal::create([
            'psikolog_id' => 10,
            'hari' => 'Sabtu',
            'jam_mulai' => '09:30',
            'jam_selesai' => '10:55',
        ]);
        Jadwal::create([
            'psikolog_id' => 10,
            'hari' => 'Sabtu',
            'jam_mulai' => '13:30',
            'jam_selesai' => '14:50',
        ]);
        Jadwal::create([
            'psikolog_id' => 10,
            'hari' => 'Sabtu',
            'jam_mulai' => '15:00',
            'jam_selesai' => '16:20',
        ]);
    }
}
