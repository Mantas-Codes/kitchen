<?php

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
        $user = App\User::create([
            'name' => 'Admin',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id
        ]);

        $user = App\User::create([
            'name' => 'Test User',
            'email' => '123@123.com',
            'password' => bcrypt('asdasd'),
            'admin' => 0
        ]);

        App\Profile::create([
            'user_id' => $user->id
        ]);
    }
}
