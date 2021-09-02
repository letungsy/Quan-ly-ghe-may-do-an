<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
class Sanphams extends Model
{
    use Notifiable;
    use SearchableTrait;
    protected $searchable=[
       
        'columns'=>[
            'sanphams.name'=>100,
            'sanphams.price'=>100,
            'danh_mucs.giamoi'=>100,
            'danh_mucs.mau'=>100,
            'danh_mucs.tendanhmuc'=>100,
        ],
        'joins'=>[
            'danh_mucs'=>['sanphams.id','danh_mucs.id']
        ]
        ];
    protected $fillable=[
        'name',
        'image',
        'sale',
        'price',
        'noidung',
        'product_id',
        'status',
        'giamphantram',
        'sogiam',
        'isNew'
    ];
    use HasFactory;
    public function galerry(){
        return $this->hasMany(Galerry::class,'id');
    }
    public function hangmuc(){
        return $this->hasMany(DanhMuc::class,'id');
    }
}
