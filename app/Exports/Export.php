<?php
namespace App\Exports;
use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromCollection;
class Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Article::all();
    }
}
