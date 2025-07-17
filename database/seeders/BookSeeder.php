<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            DB::table('buku')->insert([
                'judul' => $faker->sentence(3),
                'pengarang' => $faker->name,
                'tahun_terbit' => $faker->year,
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
