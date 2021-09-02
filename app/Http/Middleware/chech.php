<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
class chech
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static function handle(Request $request, Closure $next)
 {     
   $mangquyen=[];
    $permission=Permission::all();
    $per1=[];
    foreach($permission as $pe){
      $per1[]=$pe['name'];
    }
 foreach(Auth::user()->roles as $v){
 foreach($v->permissions as $k){
 $mangquyen[]=$k['id'];
 } 
}
echo  json_encode($mangquyen);
return $next($request); 

 }

}
