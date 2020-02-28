<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'root',
            'last_name' =>'1',
            'ruc'=>'1',
            'address'=>'Tijuana',
            'email'=>'root@ighgroup.com',
            'telefono'=> '922570393',
            'password'=> bcrypt('root'),
            'state'=>0,
            

        ]);
    }
}
