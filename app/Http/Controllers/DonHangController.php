<?php
namespace App\Http\Controllers;
use App\Models\ChitietDonhangs;
use App\Models\Donhang;
use App\Models\Sanphams;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;


class DonHangController extends Controller
{
   public function index(){
      $menu=Menu::all();
      $donhang=Donhang::paginate(10);
       $viewdata=[
         'donhang'=>$donhang,
         'menu'=>$menu
       ];
    return view("donhang.index",$viewdata);
   }
   public function thanhcong(){
       return view("donhang.thanhcong");
   }
   public function sua(Request $request){
    $id=$request->id;
    $suadon=Donhang::where('id',$id)->get();
    $suadonhang = view('donhang.edit', ['suadon' => $suadon])->render();
    return response()->json([
      'suadonhang' => $suadonhang,
      'code' => 200,
      'messege' => 'succsess'
    ], status: 200);
  }
   public function suaDonhang(){
    return view("donhang.thanhcong");
}
public function updatedonhang(Request $request,$id){
  $donhang=Donhang::find($id);
  $donhang->status=$request->status;
  $donhang->save();
  return redirect('/xemdonhang');
}
public function xemchitiet(Request $request){
  $id=$request->id;
  $donhang=Donhang::where('id',$id)->get();
  $xemchitiet = view('donhang.xemchitiet', ['donhang' => $donhang])->render();
  return response()->json([
    'xemchitiet' => $xemchitiet,
    'code' => 200,
    'messege' => 'succsess'
  ], status: 200);
}
   public function destroy($id){
    $donhang=Donhang::find($id);
    $donhang->delete();
    return redirect('/xemdonhang');
}
}
