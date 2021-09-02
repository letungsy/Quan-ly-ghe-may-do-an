<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
       ['name'=>'admin','displayname'=>'quan tri he thong'],
       ['name'=>'guest','displayname'=>'khach hang'],
       ['name'=>'dev','displayname'=>'phat trien he thong'],
       ['name'=>'content','displayname'=>'chinh sua noi dung'],
        ]);
    }
}
