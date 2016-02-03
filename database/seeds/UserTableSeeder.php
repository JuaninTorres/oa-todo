<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Juan Torres',
            'email' => 'juanin.torres@gmail.com',
            'user_type' => 'admin',
            'password' => 'secreto'
        ]);

        factory(User::class, 5)->create();
    }
}
