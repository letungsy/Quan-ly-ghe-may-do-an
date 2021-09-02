<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
class DanhMuc extends Model
{
    use HasFactory;
    use Notifiable;
    use SearchableTrait;
    protected $searchable=[
         'columns'=>[
         'danh_mucs.tendanhmuc'=>10,
         'danh_mucs.mau'=>10,
         'danh_mucs.giamoi'=>10,
         'sanphams.name'=>10,
         'sanphams.price'=>10
     ],
     'joins'=>[
       'sanphams'=>['sanphams.id','danh_mucs.id'],
     ]
    ];
    public $timestamps = false;
    protected $fillable=[
     "tendanhmuc",
     "id",
     "mau",
     "giamoi"
    ];
    public function danhmuc(){
      return $this->belongsTo(Sanphams::class,'id');
    }
}
