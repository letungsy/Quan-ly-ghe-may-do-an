<?php
namespace App\Http\Controllers;
use App\Models\Galerry;
use App\Models\Menu;
use App\Models\Sanphams;
use Illuminate\Http\Request;
class GalerryController extends Controller
{
    public function addgalerry($id)
    {
        $menu = Menu::all();
        $galerry = Galerry::all();
        $pro_id = $id;
        $sanpham = Sanphams::find($id);
        return view("galerry.add", ['pro_id' => $pro_id, 'sanpham' => $sanpham, 'galerry' => $galerry, 'menu' => $menu]);
    }
    public function themthuvien()
    {
        $menu = Menu::all();
        $sanpham = Sanphams::all();
        return view('galerry.them', ['sanpham' => $sanpham, 'menu' => $menu]);
    }
    public function storega(Request $request)
    {
        $galerry = new Galerry;
        $galerry->galerry_name = $request->galerry_name;
        if ($request->hasfile('image')) { //file upload day len
            $image = $request->file('image');
            for ($i = 0; $i < count($image); $i++) {
                $name = $image[$i]->getClientOriginalName();
                $path = $image[$i]->storeAs(
                    'public',
                    $name
                );
                Galerry::insert([
                    'galerry_name' => $request->galerry_name,
                    'id' => $request->id,
                    'image' => $galerry->image = "/" . str_replace("public", "storage", $path)
                ]);
            }
        }

        // $image=array();
        // if ($files=$request->file('image')) {
        //     foreach ($files as $file) {
        //        $image_name=md5(rand(1000,10000));
        //        $ext=strtolower($file->getClientOriginalExtension());
        //        $image_full_name=$image_name.'.'.$ext;
        //        $upload_path='public/khoanh/';
        //        $image_url=$upload_path.$image_full_name;
        //        $file->move($upload_path,$image_full_name);
        //        $image[]=$image_url;
        //     }
        // }


        // Galerry::insert([
        //     'galerry_name'=>$request->galerry_name,
        //     'id'=>$request->id,
        //     'galerry_image'=>implode('|',$image)
        // ]);
        return redirect()->back();
    }
    public function xoaanh($id)
    {
        $galerry = Galerry::where('galery_id', $id)->first();
        $galerry->delete();
        return redirect('/lietkesanpham');
    }
}
