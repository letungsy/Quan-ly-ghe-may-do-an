<?php

namespace App\Imports;

use App\Models\Sanphams;
use Maatwebsite\Excel\Concerns\ToModel;

class Importsanpham implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sanphams([
            'name'=>$row[1],
            'image'=>$row[2],
            'price'=>$row[3]
        ]);
    }
}
