<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sanphams;
class SanphamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <40 ; $i++) { 
            $sanpham=new Sanphams;
            $sanpham->name='product'.$i;
            $sanpham->price='100'.$i;
            $sanpham->image='ghe banh'.$i;
            $sanpham->save();
        }
    }
}
