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
            'admin' => true
        ]);

        User::create([
            'name' => 'augusto',
            'email' => 'correo2@correo.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
