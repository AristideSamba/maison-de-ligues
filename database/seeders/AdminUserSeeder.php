<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'civilite' => 'Mr',
            'name' => 'root',
            'prenom' => 'admin',
            'email' => 'root@m2l.com',
            'password' => Hash::make('root'),
            'date_de_naissance' => now(),
            'ville' => 'Paris',
            'pays' => 'France',
            'Photo' => './public/asset/default-profil.png',
            'service' => 'Informatique',
            'remember_token' => Str::random(10),
            'est_admin' => true,
        ]);
    }
}
