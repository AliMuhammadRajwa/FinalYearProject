<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Ali Muhammad',
            'email' => 'alimohdrajwa@gmail.com',
            'password' => bcrypt('alimuhammad'),
        ]);
        DB::table('users')->insert([
            'name' => 'Saqlain Kazmi',
            'email' => 'saqlainkazmi12120@gmail.com',
            'password' => bcrypt('saqlain'),
        ]);
        DB::table('users')->insert([
            'name' => 'Afaq Ali',
            'email' => 'afaaqaliafaq@gmail.com',
            'password' => bcrypt('afaq@ali'),
        ]);
    }
}
