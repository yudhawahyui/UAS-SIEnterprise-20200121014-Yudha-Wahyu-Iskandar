<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Semester;
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
        Mahasiswa::factory(50)->create();
        Semester::factory()->createMany(
            [
                [
                    'semester' => 1,
                ],
                [
                    'semester' => 2,
                ],
                [
                    'semester' => 3,
                ],
                [
                    'semester' => 4,
                ],
                [
                    'semester' => 5,
                ],
                [
                    'semester' => 6,
                ],
                [
                    'semester' => 7,
                ],
                [
                    'semester' => 8,
                ],
                [
                    'semester' => 9,
                ],
                [
                    'semester' => 10,
                ],
                [
                    'semester' => 11,
                ],
                [
                    'semester' => 12,
                ],
            ]
        );
        Matakuliah::factory()->createMany(
            [
                [
                    'nama_matkul' => 'Pemrograman Internet Intermediate',
                    'sks' => 4,
                ],
                [
                    'nama_matkul' => 'UI & UX Design',
                    'sks' => 2,
                ],
                [
                    'nama_matkul' => 'TOEFL Preparations',
                    'sks' => 2,
                ],
                [
                    'nama_matkul' => 'Manajemen Data Enterprise',
                    'sks' => 3,
                ],
                [
                    'nama_matkul' => 'Analisa sistem berorientasi obyek',
                    'sks' => 3,
                ],
                [
                    'nama_matkul' => 'Implementasi Arsitektur Enterprise',
                    'sks' => 3,
                ],
                [
                    'nama_matkul' => 'Rekayasa Perangkat Lunak : Agile Scrum Introduction',
                    'sks' => 3,
                ],
            ]
        );

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
