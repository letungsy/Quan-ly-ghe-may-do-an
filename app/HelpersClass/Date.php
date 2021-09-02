<?php
namespace App\HelpersClass;


class Date{
    public static function getlistDay(){
        $arrayDay=[];
        $month=date('m');
        $year=date('y');
        //lay tat ca cac ngay trong thang
        for ($day=0; $day <=31 ; $day++) { 
           $time=mktime(12,0,0,$month,$day,$year);
           if (date('m',$time)==$month) {
              $arrayDay[]=date('Y-m-d',$time);
           }
        }
        return $arrayDay;
    }
   
}