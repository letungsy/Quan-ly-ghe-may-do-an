<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChitietDonhangs extends Model
{
    protected $fillable=[
        "donhang_id",
        "product_id",
        "qty",
        "or_price",
        "or_sale" 
    ];
    use HasFactory;
    public function san(){
        return $this->belongsTo(Sanphams::class,'product_id');
        }
}
