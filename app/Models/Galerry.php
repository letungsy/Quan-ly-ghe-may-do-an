<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerry extends Model
{
  public $timestamps = false;
    protected $fillable=[
      "galerry_name",
      "image",
      "id",
      "thuoctinh"
    ];
    use HasFactory;
}
