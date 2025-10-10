<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penerbitmodel;
use App\Models\Bukumodel;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //Bukumodel::create(["kodebuku" => "001", "judul" => "pemrograman laravel", "pengarang" => "budi sudaryono", "harga" => 75000]);


        Penerbitmodel::factory(5)->create();
        Bukumodel::factory(50)->create();

        User::create([
            "name" => "admin",
            "email" => "admin@laravelbook.com",
            "password" => bcrypt("12345"),
            "isadmin" => true,
        ]);

        User::create([
            "name" => "user",
            "email" => "user@laravelbook.com",
            "password" => bcrypt("12345"),
            "isadmin" => false,
        ]);

    }
}
