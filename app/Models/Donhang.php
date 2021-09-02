<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Donhang extends Model
{
   
    protected $fillable=[
"name",
"email",
"address",
"thuoctinh",
"status",
"created_at",
"updated_at"
];
    use HasFactory;
    public function user(){
    return $this->belongsTo(User::class,'user_id');
    }
    public function donhang(){
        return $this->hasMany(ChitietDonhangs::class);
 }
      
}
