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

        DB::table('users')->insert([
            'name' => 'User3',
            'email' => 'goran.bosic3@openratio.com',
            'password' => bcrypt('test'),
            'ime_prezime' => 'Vidoje Markovic'

        ]);

        DB::table('users')->insert([
            'name' => 'User4',
            'email' => 'goran.bosic4@openratio.com',
            'password' => bcrypt('test'),
            'ime_prezime' => 'Goran Markovic'
        ]);

        DB::table('users')->insert([
            'name' => 'User5',
            'email' => 'goran.bosic5@openratio.com',
            'password' => bcrypt('test'),
            'ime_prezime' => 'Marko Markovic'
        ]);
    }
}
