<?php

namespace App\Exports;

use App\Models\Sanphams;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportsanpham implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sanphams::all();
    }
}
