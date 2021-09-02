<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\DanhMuc;
use App\Models\Sanphams;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function xemdanhmuc(){
        $menu=Menu::all();
        $danhmuc=DanhMuc::paginate(5);
        return view('danhmuc.xemdanhmuc',['danhmuc'=>$danhmuc],['menu'=>$menu]);
    }
   public function themdanhmuc(){
       $menu=Menu::all();
       $sanpham=Sanphams::all();
       return view('danhmuc.themdanhmuc',['menu'=>$menu,'sanpham'=>$sanpham]);
   }
   public function storedanhmuc(Request $request){
   $danhmuc=new DanhMuc();
   $danhmuc->tendanhmuc=$request->tendanhmuc;
   $danhmuc->id=$request->id;
   $danhmuc->mau=$request->mau;
   $danhmuc->giamoi=$request->giamoi;
   $danhmuc->save();
   return redirect()->back();
}
public function thaydoidanhmuc(Request $request){
    $id=$request->id;
    $menu=Menu::all();
    $danhmuc=DanhMuc::where('danhmuc_id',$id)->first();
    $editdanhmuc= view('danhmuc.edit',['danhmuc'=>$danhmuc,'menu'=>$menu])->render();
    return response()->json([
      "editdanhmuc"=>$editdanhmuc,
      'code' => 200,
      'messege' => 'succsess'
    ], status: 200);
}
public function showdanhmuc($id){
    $danhmuc=DanhMuc::where('tendanhmuc',$id)->get();
    return view('danhmuc.showdanhmuc',['danhmuc'=>$danhmuc]);
}
public function nanglen (Request $request,$danhmuc_id){
    $danhmuc=DanhMuc::find($danhmuc_id);
    $danhmuc->tendanhmuc=$request->tendanhmuc;
    $danhmuc->id=$request->id;
    $danhmuc->mau=$request->mau;
    $danhmuc->giamoi=$request->giamoi;
    $danhmuc->save();
    return redirect('/lietkedanhmuc');
}
public function xoadanhmuc($id)
{
    $danhmuc = DanhMuc::find($id);
    $danhmuc->delete();
    return redirect('/lietkedanhmuc')->with('msg', 'removed');
}
public function timkiemxem(){
    $query=request('query');
    $danhmuc=DanhMuc::search($query)->paginate(10);
    $menu=Menu::all();
    return view('danhmuc.xemdanhmuc',['menu'=>$menu,'danhmuc'=>$danhmuc]);
}
}
