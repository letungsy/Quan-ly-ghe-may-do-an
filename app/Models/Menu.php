<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   public $timestamps = false;
  protected $fllable=[
        'menulon',
        "menunho",
        "menunho2",
        "menunho3",
        'route1',
        'route2',
        'route3',
        "chuyenid",
        "quyen",
  ];
    use HasFactory;
}
