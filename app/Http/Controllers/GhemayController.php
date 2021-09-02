<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Sanphams;
use App\Models\Product;
use App\Models\User;
use App\Models\Donhang;
use Carbon\Carbon;
use App\Mail\ShoppingMail;
use App\Models\ChitietDonhangs;
use App\Models\DanhMuc;
use App\Models\Galerry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class GhemayController extends Controller
{
  public function index(Request $request)
  {
    $ghe = Sanphams::all();
   
    return view('ghemay.ghemay', ['ghe' => $ghe]);
  }

  public function detail($id)
  {
    $sanpham = Sanphams::find($id);
    return view('ghemay.detail', ['sanpham' => $sanpham]);
  }
  public function search(Request $request)
  {
    
    $query=request('query');
    $sanpham=Sanphams::search($query)->paginate(50);
    $danhmuc=DanhMuc::search($query)->paginate(50);
    return view('search', ['sanpham' => $sanpham,'danhmuc'=>$danhmuc]);
  }
  public function addToCart(Request $request,$id)
  {  
  
    //  session()->flush('cart');
    $product = Sanphams::find($id);
    $cart = session()->get('cart');
    $thuoctinh= $request->thuoctinh;
    if (isset($cart[$id.'_'.$thuoctinh])) {
      $cart[$id.'_'.$thuoctinh]["quantity"] = $cart[$id.'_'.$thuoctinh]["quantity"] + 1;
    } 
    else {
      $cart[$id.'_'.$thuoctinh] = [
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'image' => $product->image,
        'sale'=>$product->sale,
        'status'=>$product->status,
        'giamphantram'=>$product->giamphantram,
        'sogiam'=>$product->sogiam,
        "thuoctinh"=>$request->thuoctinh,
      ];
   
     session()->put('cart', $cart);
    $cart = session()->get('cart');
    $her = view('hinh', ['cart' => $cart])->render();
    return response()->json([
      'her'=>$her,
      'code' => 200,
      'messege' => 'succsess'
    ],200);

}

}
  public function showCart()
  {
    $sanpham=Sanphams::all();
    $carts = session()->get('cart');
    if (isset($carts)) {
      return view('ghemay.cart', ['carts' => $carts,'sanpham'=>$sanpham]);
    } else {
      return redirect("/ghemay");
    }
  }
public function hover(){
  $carts = session()->get('cart');
  if (isset($carts)) {
   $carthover=view('ghemay.hover', ['carts' => $carts])->render();
   return response()->json([
    "carthover"=>$carthover,
    "code"=>200,
    "message"=>'success'
   ]);
  } else {
    return redirect("/");
  }
}

  public function updateCart(Request $request)
  {
    if ($request->id && $request->quantity) {
      $carts = session()->get('cart');
      $carts[$request->id]['quantity'] = $request->quantity;
      session()->put('cart', $carts);
      $carts = session()->get('cart');
      $cartComponent = view('ghemay.component.cart_component', ['carts' => $carts])->render();
      $her = view('hinh', ['carts' => $carts])->render();
      return response()->json([
        'her'=>$her,
        'cart_component' => $cartComponent,
        'code' => 200,
        'messege' => 'succsess'
      ],200);
    }
  }
  public function deleteCart(Request $request)
  {
    if ($request->id) {
      $carts = session()->get('cart');
      unset($carts[$request->id]);
      session()->put('cart', $carts);
      $carts = session()->get('cart');
      $her = view('hinh', ['carts' => $carts])->render();
      $cartComponent = view('ghemay.component.cart_component', ['carts' => $carts])->render();
      return response()->json([
        'her'=>$her,
        'cart_component' => $cartComponent,
        'code' => 200,
        'messege' => 'succsess'
      ], 200);
    }
  }
  public function thanhtoan()
  {
    $carts = session()->get( 'cart');
    return view('ghemay.pay', ['carts' => $carts]);
  }
  public function saveCart(Request $request)
  {
    $total = 0;
    $carts = session()->get('cart');
    foreach ($carts as $v) {
      if($v['quantity']>$v['sogiam']&&$v['status']!=0&&$v['thuoctinh']==0){
        $total+=$v["price"]*$v['quantity']-($v['price']*$v['giamphantram'])/100;
       }
         elseif($v['quantity']>$v['sogiam']&&$v['status']!=0&&$v['thuoctinh']!=0){
           $total+= $v["thuoctinh"]*$v['quantity']-($v['thuoctinh']*$v['giamphantram'])/100;
         }
          elseif($v['quantity']<$v['sogiam']&&$v['status']!=0&$v['thuoctinh']==0){
           $total+=($v["price"]-($v["price"]*$v['sale'])/100)*$v['quantity'];
         }
          elseif($v['quantity']>$v['sogiam']&&$v['status']==0&$v['thuoctinh']==0){
           $total+=($v["price"]-($v["price"]*$v['sale'])/100)*$v['quantity'];
         } 
          else
          { $total+=$v["thuoctinh"]-($v["thuoctinh"]*$v['sale'])/100*$v['quantity'];
       }
    }
    // $donhangId = Donhang::insertGetId([
    //   'total' => (int)str_replace(',', '', $total),
    //   'note' => $request->note,
    //   'name'=>$request->name,
    //   'email'=>$request->email,
    //   'address' => $request->address,
    //   'phone' => $request->phone,
    //   'thuoctinh'=>$request->thuoctinh,
    //   "created_at"=>Carbon::now(),
    //   "updated_at"=>Carbon::now(),
      $donhang=new Donhang();
      $donhang->total=(int)str_replace(',', '', $total);
      $donhang->note=$request->note;
      $donhang->email=$request->email;
      $donhang->address=$request->address;
      $donhang->phone=$request->phone;
      $donhang->phone=$request->name;
      $donhang->thuoctinh=$request->thuoctinh;
      $donhang->created_at=Carbon::now();
      $donhang->updated_at=Carbon::now();
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address'=>'required',
        'phone'=>'required|numeric',
        'note'=>'required',
        'thuoctinh'=>'required'
    ]);
    $donhang->save();
    // ]);
   
      $carts = session()->get( 'cart');
      foreach ($carts as $key => $v) {
        foreach($donhang as $k=>$l){
        ChitietDonhangs::insert([
          'donhang_id' => $k,
          'qty' => $v['quantity']
        ]);
    $detail = [
      "phone" => $request->phone,
      "address" => $request->address,
      "thuoctinh"=>$request->thuoctinh,
      'email'=>$request->email,
      'name' => $request->name
    ];
    session()->flush('cart');
    Mail::to($request->email)->send(new ShoppingMail($carts, $detail));
    return redirect("/thanhcong");
  }
}
}
}