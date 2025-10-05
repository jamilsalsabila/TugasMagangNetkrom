<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Penerbitmodel;
use Illuminate\Database\Seeder;
use App\Models\Bukumodel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Bukumodel::create(["kodebuku" => "001", "judul" => "pemrograman laravel", "pengarang" => "budi sudaryono", "harga" => 75000]);


        Penerbitmodel::factory(2)->create();
        Bukumodel::factory(50)->create();

    }
}
