<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Sanphams;
use App\Models\Product;
use App\Exports\Exportsanpham;
use App\Imports\Importsanpham;
use App\Models\DanhMuc;
use App\Models\Menu;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class SanphamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $menu=Menu::all();
        $list = new Product;
        $configs = $list->list();
        $conditions = $list->get($request, $configs);
        $sanpham = Sanphams::where($conditions)->paginate(4);
        if ($request->get('sort') == 'price_asc') {
            $sanpham = Sanphams::where($conditions)
                ->orderBy('price', 'asc')
                ->paginate(4);
        } elseif ($request->get('sort') == 'price_desc') {
            $sanpham = Sanphams::where($conditions)
                ->orderBy('price', 'desc')
                ->paginate(4);
        }
        return view('sanpham.xem', ['sanpham' => $sanpham], ['configs' => $configs,"menu"=>$menu]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $menu=Menu::all();
        $sanpham = Sanphams::all();
        return view('sanpham.them',['sanpham'=>$sanpham,'menu'=>$menu]);
    }
    public function thaydoigia(Request $request)
    { 
        $menu=Menu::all();
        $carts = session()->get(key: 'cart');
        $list = new Product;
        $configs = $list->list();
        $conditions = $list->get($request, $configs);
        $sanpham = Sanphams::where($conditions)->paginate(4);
        return view('sanpham.thaydoigia', ['sanpham' => $sanpham,'configs' => $configs,'carts'=>$carts,'menu'=>$menu]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanpham = new Sanphams;
        $sanpham->name = $request->name;
        $sanpham->price = $request->price;
        $sanpham->sale = $request->sale;
        $sanpham->isNew = $request->isNew;
        $sanpham->status=$request->status;
        $sanpham->product_id =$request->id;
        if ($request->hasfile('image')) { //file upload day len
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs(
                'public',
                $name
            );
            $sanpham->image = "/" . str_replace("public", "storage", $path);
        }
        $sanpham->noidung = $request->noidung;
        $this->validate($request, [
            'name' => 'required|unique:sanphams|max:255',
            'price' => 'required'
        ]);
        $sanpham->save();
        return redirect()->back()->with('status', 'thanhcong','message');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   $id=$request->id;
        $sanpham = Sanphams::where('id',$id)->get();
        $show=view('sanpham.show', ['sanpham' => $sanpham])->render();
        return response()->json([
        'show'=>$show,
        'code'=>200,
        'messege'=>'success'
        ],200);
    }
    public function timkiemshow(Request $request){
        $id=$request->id;
        $sanpham=Sanphams::where('id',$id)->get();
        $timkiemshow=view('sanpham.timkiemshow',['sanpham'=>$sanpham])->render();
        return response()->json([
        'timkiemshow'=>$timkiemshow,
        'code'=>200,
        'messege'=>'success'
        ]);
    }
    public function timkiemsanpham(){
    $list = new Product;
    $configs = $list->list();
    $query=request('query');
    $sanpham=Sanphams::search($query)->paginate(10);
    $menu=Menu::all();
    return view('sanpham.xem',['menu'=>$menu,'sanpham'=>$sanpham,'configs'=>$configs]);
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu=Menu::all();
        $sanpham = Sanphams::find($id);
        return view('sanpham.edit', ['sanpham' => $sanpham,'menu'=>$menu]);
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
        $sanpham = Sanphams::find($id);
        $sanpham->name = $request->name;
        $sanpham->price = $request->price;
        if ($request->hasfile('image')) { //file upload day len
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs(
                'public',
                $name
            );
            $sanpham->image = "/" . str_replace("public", "storage", $path);
        }
        $sanpham->noidung = $request->noidung;
        $sanpham->status = $request->status;
        $sanpham->save();
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
        $sanpham = Sanphams::find($id);
        $sanpham->delete();
        return redirect('/lietkesanpham')->with('msg', 'removed');
    }
    public function export()
    {
        return Excel::download(new Exportsanpham(), 'exportsanpham.xlsx');
    }
    public function import(Request $request)
    {
        $sanphams = Excel::toCollection(new Importsanpham(),$request->file('file'));
        foreach ($sanphams[0] as  $sanpham) {
            Sanphams::where('id', $sanpham[0])->update([
                "name" => $sanpham[1],
                "price" => $sanpham[3],
                "status"=>$sanpham[5],
                "giamphantram"=>$sanpham[6],
                "sogiam"=>$sanpham[7],
                "thaydoiten"=>$sanpham[8]
            ]);
        }
        return redirect()->route("thaydoigia");
    }
}
