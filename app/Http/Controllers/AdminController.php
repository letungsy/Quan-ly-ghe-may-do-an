<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AdminController extends Controller
{
public function imgUpload(Request $request){
// $mainImage=$request->file('file');
// $filename=time().'.'.$mainImage->extension();
// Image::make($mainImage)->save(public_path("tinymce_images/".$filename));
// return json_encode(['location'=>asset('tinymce_images/'.$filename)]);
// $sanpham=new Sanphams;
$fileName=$request->file('file')->getClientOriginalExtension();
$path=$request->file('file')->storeAs('uploads',$fileName,'public');
return response()->json(['location'=>"/storage/$path"]);
// $imgpath=request()->file('file')->store('uploads','public');
// return response()->json(['location'=>"/storage/$imgpath"]);
}
}

