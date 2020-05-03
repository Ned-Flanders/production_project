<?php

use Illuminate\Database\Seeder;

class FlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flags')->insert([
            'challenge_name' => 'CSRF Challenge 1',
            'flag' => 'flag{JVI9INvF9xOx411YoEqLc9dY65IeFBJi7t2d6fQ5}',
            'course' => 'Web',
        ]);
    }
}
