<?php
namespace App\Http\Controllers;
use App\HelpersClass\Date;
use App\Models\Donhang;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Sanphams;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function xemthongke(){
        $soluongdonhang=Donhang::count();
        $soluonguser=User::count();
        $soluongsanpham=Sanphams::count();
        $menu= Menu::all();
        $donhang=Donhang::all();
        $xuli=Donhang::where('status',1)->count();
        $chuaxuli=Donhang::where('status',0)->count();
        $dienthoai=Donhang::where('status',2)->count();
        $chuadienthoai=Donhang::where('status',3)->count();
        $donhoantat=Donhang::where('status',4)->count();
        $dahuy=Donhang::where('status',5)->count();
        $statusdonhang=[
            [
                "XU LY",$xuli
            ],
            [
                " CHUA XU LY",$chuaxuli
            ],
            [
                "DIEN THOAI",$dienthoai
            ],
            [
                "CHUA DIEN THOAI",$chuadienthoai
            ],
            [
                "HOAN TAT",$donhoantat
            ],
            [
                "DA HUY",$dahuy
            ],
            ];
            $listDay=Date::getlistDay();
            $doanhthu=Donhang::where('status',4)
            ->whereMonth('created_at',date('m'))
            ->select(DB::raw('sum(total) as tongtien'),DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
            $arraydoanhthu=[];
            foreach($listDay as $day){
                $total=0;
                foreach($doanhthu as $doanh){
                    if ($doanh['day']==$day) {
                       $total=$doanh['tongtien'];
                       break;
                    }
                }
               $arraydoanhthu[]=(int)$total;
            }
        $dataview=[
            'soluongdonhang'=>$soluongdonhang,
            'soluonguser'   =>$soluonguser,
            'soluongsanpham'=>$soluongsanpham,
            'menu'          =>$menu,
            'donhang'       =>$donhang,
            'statusdonhang' =>json_encode($statusdonhang),
            'listDay'       =>json_encode($listDay),
            'arraydoanhthu' =>json_encode($arraydoanhthu)
        ];
     
        return view('thongke.xemthongke',$dataview);
    }
    public function index()
    {
        $menu= Menu::get();
        return view('home',['menu'=>$menu]);
    }
    public function banh(Request $request)
    {
        $menu= new Menu();
        $menu->menulon=$request->menulon;
        $menu->menunho=$request->menunho;
        $menu->menuthu2=$request->menuthu2;
        $menu->menunho3=$request->menunho3;
        $menu->route1=$request->route1;
        $menu->route2=$request->route2;
        $menu->route3=$request->route3;
        $menu->quyen=$request->quyen;
        $menu->chuyenid=$request->chuyenid;
        $menu->save();
        return redirect()->back();
    }
    public function xemmenu(){
        $menu= Menu::all();
        return view('menu',['menu'=>$menu]);
    }
    public function xoamenu($id){
  $menu=Menu::find($id);
  $menu->delete();
  return redirect()->back();
 }
    
}
