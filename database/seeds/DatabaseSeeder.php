<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            [
                'email' => 'admin@admin.com',
                'is_admin' => 1,
                'name' => 'Admin',
                'password' => Hash::make('admin')
            ],
            [
                'email' => 'user1@user.com',
                'is_admin' => 0,
                'name' => 'User1',
                'password' => Hash::make('user')
            ],
            [
                'email' => 'user2@user.com',
                'is_admin' => 0,
                'name' => 'User2',
                'password' => Hash::make('user')
            ],
            [
                'email' => 'user3@user.com',
                'is_admin' => 0,
                'name' => 'User3',
                'password' => Hash::make('user')
            ],
            [
                'email' => 'user4@user.com',
                'is_admin' => 0,
                'name' => 'User4',
                'password' => Hash::make('user')
            ],
            [
                'email' => 'user5@user.com',
                'is_admin' => 0,
                'name' => 'User5',
                'password' => Hash::make('user')
            ],
            [
                'email' => 'user6@user.com',
                'is_admin' => 0,
                'name' => 'User6',
                'password' => Hash::make('user')
            ],
            [
                'email' => 'user7@user.com',
                'is_admin' => 0,
                'name' => 'User7',
                'password' => Hash::make('user')
            ],
            [
                'email' => 'user8@user.com',
                'is_admin' => 0,
                'name' => 'User8',
                'password' => Hash::make('user')
            ]
        ]);

        DB::table('types')->insert([
            [
                'name' => 'Pen',
                'image' => 'Stationarytype.png'
            ],
            [
                'name' => 'Book',
                'image' => 'Stationarytype.png'
            ],
            [
                'name' => 'Flower',
                'image' => 'Stationarytype.png'
            ]
        ]);

        DB::table('stationaries')->insert([
            [
                'name' => 'Pen 1',
                'type' => 1,
                'stock' => '10',
                'price' => '11111',
                'description' => 'My Pen 1',
                'image' => 'Stationary.png'
            ],
            [
                'name' => 'Pen 2',
                'type' => 1,
                'stock' => '20',
                'price' => '22222',
                'description' => 'My Pen 2',
                'image' => 'Stationary.png'
            ],
            [
                'name' => 'Book 1',
                'type' => 2,
                'stock' => '30',
                'price' => '33333',
                'description' => 'My Book 1',
                'image' => 'Stationary.png'
            ],
            [
                'name' => 'Book 2',
                'type' => 3,
                'stock' => '40',
                'price' => '44444',
                'description' => 'My Book 2',
                'image' => 'Stationary.png'
            ]
        ]);
    }
}
