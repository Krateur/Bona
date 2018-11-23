<?php

use Illuminate\Database\Seeder;

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
        for($i=1; $i <= 2; $i++){
            \App\User::create([
                'name' => "John Doe $i",
                'email' => "johndoe$i@doe.fr",
                'password' => bcrypt('123456')
            ]);
        }
    }
}
