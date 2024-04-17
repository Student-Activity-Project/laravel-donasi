<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(5)->create();

        \App\Models\Donasi::create([
             'judul' => 'Bantu Korban Banjir',
             'deskripsi' => 'Bantu korban banjir di daerah Jakarta',
             'target_donasi' => 10000000,
             'total_donasi' => 50000,
             'id_user' => 1
        ]);
        \App\Models\UserDonasi::create([
            'id_donasi' => 1,
            'jumlah_donasi' => 50000,
            'id_user' => 2
       ]);

       \App\Models\Donasi::create([
            'judul' => 'Bantu Korban Gempa',
            'deskripsi' => 'Bantu korban banjir di daerah XYZ',
            'target_donasi' => 50000000,
            'total_donasi' => 0,
            'id_user' => 2
        ]);
    }
}
