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
        $user = "admin";
        
            DB::table('users')->insert([
                'name' => $user,
                'email' => $user.'@mail.com',
                'password' => bcrypt($user),
                'role' => $user
            ]);
        
    }
}
