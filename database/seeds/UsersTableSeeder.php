<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'cesar',
            'email' => 'correo@correo.com',
            'password' => bcrypt('12345678'),
            'admin' => true,
            'phone' => '987654321',
            'address' => 'Av Central 458',
            'username' => 'cesar27'
        ]);

        User::create([
            'name' => 'augusto',
            'email' => 'correo2@correo.com',
            'password' => bcrypt('12345678'),
            'phone' => '987951321',
            'address' => 'Av Central 450',
            'username' => 'cesar2727'
        ]);
    }
}
