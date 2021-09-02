<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(Request $request)
    {
        
//         $permission=Permission::find(1);
    //    $u=User::find(7);
    //   $role=Role::find(4);
    //    $u->syncRoles($role);
//         // $permission = Permission::create(['name' => 'edit articles']);
        $menu=Menu::all();
        $role=Role::orderBy('id','DESC')->get();
        $users = User::whereRaw(1);
        $users = $users->orderBy('id', 'DESC')->paginate(7);
        $viewData = [
            'users' => $users,
             'role'=>$role,
             'menu'=>$menu
        ];
        return view("user.index", $viewData);
    }
    public function __construct(User $user)
    {
    
        $this->user = $user;
    }

    public function themthanhvien()
    {
        $menu=Menu::all();
        return view('user.themthanhvien',['menu'=>$menu]);
    }
    public function xoauser()
    {
        $menu=Menu::all();
        $users = User::whereRaw(1);
        $users = $users->orderBy('id', 'DESC')->paginate(7);
        $viewData = [
            'users' => $users,
            'menu'=>$menu
        ];
        return view("user.xoauser", $viewData);
    }
    public function delete($id)
    {
       $users = User::find($id);
       if ($users->id==5) {
        return redirect('/xoauser');
       }
       else{
        $users->delete();
        return redirect('/xoauser')->with('msg', 'removed');
       }
    }
    public function store(Request $request)
    {
        $user = $this->user->create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        $user->save();
        return redirect()->route('user');
    }
public function chuyenquyen($id){
$user=User::find($id);
if ($user) {
  Session::put('chuyenquyen',$user->id);
}
return redirect("/user");
}
public function xoachuyenquyen(){
session()->forget('chuyenquyen');
return redirect('/user');
} 
    public function timuser(Request $request){
        $menu=Menu::all();
        $users=User::
        where('email','like','%'.$request->input('query').'%')
        ->paginate(4);
     return view('user.index',['users'=>$users,'menu'=>$menu]);
    }
    public function phanquyen($id){
        $menu=Menu::all();
        $user=User::find($id);
        $role=Role::orderBy('id','DESC')->get();
        $all_colum_roles=$user->roles->first();
        return view('user.phanquyen',compact('user','role','all_colum_roles','menu'));
    }
    public function xoavaitro(){
        $menu=Menu::all();
        $role=Role::orderBy('id','DESC')->get();
        return view('user.xoavaitro',compact('role',"menu"));
    }
    public function xoathatvaitro($id){
       $role=Role::find($id);
       $role->delete();
       return redirect('/xoavaitro')->with('msg', 'removed');
    }
    public function xoaquyen(){
        $menu=Menu::all();
        $permission=Permission::orderBy('id','ASC')->paginate(8);
        return view('user.xoaquyen',compact('permission','menu'));
    }
    public function xoaquyenthat($id){
        $permission=Permission::find($id);
        $permission->delete();
        return redirect('/xoaquyen')->with('msg', 'removed');
    }
    public function themrole(Request $request,$id){
        $user=User::find($id);
        $data=$request->all();
        $user->syncRoles($data['role']);//them xong xoa quyen cu duoc
        // $user->assignRoles($data['role']); //ni k xoa duoc
        return redirect()->back();
    }
    public function phanquyennho($id){
        $menu=Menu::all();
        $user=User::find($id);
        $permission=Permission::orderBy('id','DESC')->get();
        $name_roles=$user->roles->first()->name;
        $get_permission_via_role=$user->getPermissionsViaRoles();
        return view('user.phanquyennho',compact('user','permission','name_roles','get_permission_via_role','menu'));
    }
    public function themrolenho(Request $request,$id){
        $user=User::find($id);
        $data=$request->all();
        $role_id=$user->roles->first()->id;
        $role=Role::find($role_id);
        $role->syncPermissions($data['permission']);
        return redirect()->back();
    }
    public function themquyennua(Request $request){
        $data=$request->all(); 
        $permission= new Permission();
        $permission->name=$data['themquyen'];
        $permission->save();
        return redirect()->back();
    }
    public function themvaitronua(Request $request){
        $data=$request->all(); 
        $role= new Role();
        $role->name=$data['themvaitro'];
        $role->save();
        return redirect()->back();
    }
}
