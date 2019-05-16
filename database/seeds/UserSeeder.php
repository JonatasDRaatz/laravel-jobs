<?php

use Illuminate\Database\Seeder;
use App\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->MyUser();

        factory(\App\User::class,10)->create();
    }

    public function MyUser()
    {
        User::Create([ 
            'name' =>'user',
            'username' =>'user',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
