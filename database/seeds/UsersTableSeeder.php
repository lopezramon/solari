<?php

use Caffeinated\Shinobi\Models\Role;
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
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@backoffice.com',
                'password' => Hash::make('12345678'),
                'activation_token' => str_random(60),
                'active' => 1,
            ],
            [
                'name' => 'Steven',
                'lastname' => 'Sucre',
                'email' => 'steven.sucre@jumperr.com',
                'password' => Hash::make('12345678'),
                'activation_token' => str_random(60),
                'active' => 1,
            ],
            [
                'name' => 'Erick',
                'lastname' => 'Perez',
                'email' => 'erick.perez@jumperr.com',
                'password' => Hash::make('12345678'),
                'activation_token' => str_random(60),
                'active' => 1,
            ],
            [
                'name' => 'Euglis',
                'lastname' => 'Lopez',
                'email' => 'euglis.lopez@jumperr.com',
                'password' => Hash::make('12345678'),
                'activation_token' => str_random(60),
                'active' => 1,
            ],
            [
                'name' => 'Paola',
                'lastname' => 'Colina',
                'email' => 'paola.colina@jumperr.com',
                'password' => Hash::make('12345678'),
                'activation_token' => str_random(60),
                'active' => 1,
            ],
            [
                'name' => 'Leonel',
                'lastname' => 'Castellano',
                'email' => 'leonel.castellano@jumperr.com',
                'password' => Hash::make('12345678'),
                'activation_token' => str_random(60),
                'active' => 1,
            ],
        ]);

        DB::table('user_details')->insert([
            [
                'themes' => 'night.css',
                'user_id' => 1,
            ],
            [
                'themes' => 'night.css',
                'user_id' => 2,
            ],
            [
                'themes' => 'night.css',
                'user_id' => 3,
            ],
            [
                'themes' => 'night.css',
                'user_id' => 4,
            ],
            [
                'themes' => 'night.css',
                'user_id' => 5,
            ],
            [
                'themes' => 'night.css',
                'user_id' => 6,
            ]
        ]);

        DB::table('role_user')->insert([
            [
                'role_id' => 1,
                'user_id' => 1
            ],
            [
                'role_id' => 3,
                'user_id' => 2
            ],
            [
                'role_id' => 1,
                'user_id' => 3
            ],
            [
                'role_id' => 3,
                'user_id' => 3
            ],
            [
                'role_id' => 3,
                'user_id' => 4
            ],
            [
                'role_id' => 3,
                'user_id' => 5
            ],
            [
                'role_id' => 3,
                'user_id' => 6
            ]
        ]);
    }
}