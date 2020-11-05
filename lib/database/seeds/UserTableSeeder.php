<?php

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
        $data=[
            [
                'name'=>'Phuc',
                'email'=>'phuctienhoang@gmail.com',
                'password'=> bcrypt(1),
                'level'=> 1,
            ],
            [
                'name'=>'Phuc',
                'email'=>'phuctien@gmail.com',
                'password'=> bcrypt(1),
                'level'=> 1,
            ],
        ];
        DB::table('vp_users')->insert($data);
    }
}
