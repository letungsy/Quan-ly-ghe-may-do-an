<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tintuc;
use App\Models\Menu;
use App\Exports\Export;
use App\Imports\Import;
use App\Models\DanhMuc;
use App\Models\Product;
use App\Models\Sanphams;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$danhmuc=DanhMuc::all();
 $menu=Menu::all();
 $article=Tintuc::paginate(4);
  return view('article.list',['menu'=>$menu])->with(compact('article','danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu=Menu::all();
        return view('article.create',['menu'=>$menu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article=new Tintuc;
        $article->title=$request->title;
        $article->mota=$request->mota;
        $article->content=$request->content;
        if($request->hasfile('image')) { //file upload day len
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs(
                'public',$name
            );
            $article->image="/".str_replace("public","storage",$path);
           }
        $article->save();
        return redirect()->route('create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edittintuc($id)
    {
       $menu=Menu::all();
        $tintuc = Tintuc::find($id);
       return view('article.edit', ['tintuc' => $tintuc,'menu' => $menu]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tintuc = Tintuc::find($id);
        $tintuc->title = $request->title;
        $tintuc->mota = $request->mota;
        if ($request->hasfile('image')) { //file upload day len
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs(
                'public',
                $name
            );
            $tintuc->image = "/" . str_replace("public", "storage", $path);
        }
        $tintuc->content = $request->content;
        $tintuc->save();
        return redirect()->back()->with('update', 'update succes');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc = Tintuc::find($id);
        $tintuc->delete();
        return redirect('baiviet')->with('msg', 'removed');
    }
    public function tintuc()
    {
        $danhmuc=DanhMuc::all();
        $tintuc= Tintuc::paginate(3);
        return view('article.tintuc',["tintuc"=>$tintuc,'danhmuc'=>$danhmuc]);
    }
    public function showtintuc($id)
    {
        $danhmuc=DanhMuc::all();
         $showtintuc=Tintuc::find($id);
        return view('article.showtintuc',['showtintuc'=>$showtintuc,'danhmuc'=>$danhmuc]);
        
    }
    public function gioithieu()
    {  
        return view('article.gioithieu');
    }
   
 
}
