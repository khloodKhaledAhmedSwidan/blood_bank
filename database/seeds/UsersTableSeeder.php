<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            'name' => 'khlood',
            'email' => 'Swidan@gamil.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
