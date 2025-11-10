<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Operator',
                'email'=>'operator@gmail.com',
                'role'=>'operator',
                'password'=>bcrypt('pln_123')
            ],
             [
                'name'=>'Pengguna',
                'email'=>'pengguna@gmail.com',
                'role'=>'pengguna',
                'password'=>bcrypt('12345')
            ],
        ];

        foreach($userData as $key => $val ){
            User::create($val);
        }
    }
}
