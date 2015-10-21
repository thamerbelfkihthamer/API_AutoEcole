<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('client')->insert([
        'type_piece'=>1,
        'num_piece'=>1,

       'name'=>'thamer',
        'prenom'=>'belfkih',
        'email'=>'thamer@hotmail.com',
        'tel'=>3255676,
        'adresss'=>'address1 adress2'
    ]);
    }
}
