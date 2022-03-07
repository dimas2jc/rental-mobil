<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Uuid::uuid4();
        DB::table('employes_company')->insert([
            'id_employes' => $id,
            'name_employes' => 'admin',
            'address_employes' => 'Jl. Pare-Kediri',
            'phone_employes' => '082317881411',
            'email_employes' => 'dimasihsan.almahdi@gmail.com',
            'status_employes' => 1
        ]);

        DB::table('users')->insert([
            'id' => $id,
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'email' => 'dimasihsan.almahdi@gmail.com',
            'role' => 1
        ]);
    }
}
