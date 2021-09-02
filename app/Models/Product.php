<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function get($request,$configs){
      $conditions=[];
      if ($request->method()=='POST') {
      foreach ($configs as  $config) 
      if (!empty($config['filter'])) {
       $value=$request->input($config['field']);
        switch ($config['filter']) {
          case 'equal':
            $conditions[]=[
            'field'=>$config['field'],
            'condition'=>'=',
            'value'=>$value
            ];  
            break;
            case 'like':
              $conditions[]=
              [
                'field'=>$config['field'],
                'condition'=>'like',
                'value'=>'%' .$value. '%'
                ];  
              break;
              case 'between':
                if (!empty($value['from'])) {
                 $conditions[]=[
                  'field'=>'price',
                 'condition'=>'>=',
                  'value'=>$value['from']
                ];
                }
                if (!empty($value['to'])) {
                  $conditions[]=[
                   'field'=>'price',
                  'condition'=>'<=',
                   'value'=>$value['to']
                 ];
                 }
                break;
        }
      }
      }
      return $conditions;
    }
    public function list(){
        return [
            [
              'field'=>'id',
              'name'=>'ID',
              'type'=>'text',
              'filter'=>'equal'
            ],
            [
               'field'=>'name',
               'name'=>'ten san pham',
               'type'=>'text',
               'filter'=>'like'
            ],
             [
               'field'=>'price',
               'name'=>'gia san pham',
               'type'=>'number',
               'filter'=>'between'
             ],
             [
              'field'=>'sale',
              'name'=>'sale',
              'type'=>'number',
              'filter'=>'between'
            ],
          
             [
               'field'=>'image',
               'name'=>'anh san pham',
               'type'=>'image'
             ],
             [
              'field'=>'themthuvien',
              'name'=>'themthuvien',
              'type'=>'themthuvien'
            ],
            //  [
            //   'field'=>'noidung',
            //   'name'=>'noi dung san pham',
            //   'type'=>'text'
            
            // ],
             [
               'field'=>'updated_at',
               'name'=>'ngay cap nhat',
               'type'=>'text'
             ],
             [
               'field'=>'created_at',
               'name'=>'ngay dang ',
               'type'=>'text'
             ],
             [
                'field'=>'show',
                'name'=>'show',
                'type'=>'show'
              ],
            
              [
                'field'=>'edit',
                'name'=>'Sua',
                'type'=>'edit'
              ],
              [
                'field'=>'delete',
                'name'=>'xoa',
                'type'=>'delete'
              ]
            ];
    }
}
